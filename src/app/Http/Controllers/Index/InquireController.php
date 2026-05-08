<?php

namespace App\Http\Controllers\Index;

use App\Mail\NewInquiryNotification;
use App\Models\Enquiry;
use App\Settings\GeneralSettings;
use App\Support\InquiryCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InquireController extends BaseController
{
    public function form(Request $request)
    {
        $captchaEnabled = $this->isCaptchaEnabled();
        $this->data['inquiryCaptcha'] = $captchaEnabled ? InquiryCaptcha::generate($request->session()) : null;

        return view('index.inquire.form', $this->data);
    }

    public function success(Request $request, $lang)
    {
        $this->data['returnTo'] = $this->sanitizeReturnTo(
            $request->query('return_to'),
            route('inquire.form', ['lang' => $lang])
        );
        $this->data['autoRedirectSeconds'] = 5;

        return view('index.inquire.success', $this->data);
    }

    public function submit(Request $request, $lang)
    {
        $captchaEnabled = $this->isCaptchaEnabled();
        $isHeroForm = $request->input('form_variant') === 'hero';

        // 1. 验证数据
        $rules = [
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'need' => 'nullable|string|max:255',
            // 注意：interest 在表单中是多选，验证为数组
            'interest' => 'nullable|array',
            'message' => 'nullable|string',
            'captcha_id' => 'nullable|string',
            'captcha_answer' => 'nullable|string|max:32',
            'form_variant' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:0',
            'return_to' => 'nullable|string|max:2048',
        ];

        if ($isHeroForm) {
            $rules['need'] = 'required|string|max:255';
            $rules['message'] = 'required|string';
        }

        if ($captchaEnabled && !$isHeroForm) {
            $rules['captcha_id'] = 'required|string';
            $rules['captcha_answer'] = 'required|string|max:32';
        }

        $validated = $request->validate($rules);

        if ($captchaEnabled && !$isHeroForm && !InquiryCaptcha::validate(
            $request->session(),
            $validated['captcha_id'] ?? null,
            $validated['captcha_answer'] ?? null
        )) {
            return redirect()
                ->back()
                ->withErrors(['captcha_answer' => $this->captchaInvalidMessage()])
                ->withInput();
        }

        // 2. 整理元数据 (存入 meta_data JSON 字段)
        $metaData = [
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'interest' => $validated['interest'] ?? [],
            'need' => $validated['need'] ?? null,
            'source' => $isHeroForm ? 'hero' : 'contact',
        ];

        $message = trim((string) ($validated['message'] ?? ''));

        if ($isHeroForm) {
            $messageParts = array_filter([
                filled($validated['need'] ?? null) ? 'Need: ' . $validated['need'] : null,
                filled($message) ? 'Requirement: ' . $message : null,
            ]);

            $message = implode("\n", $messageParts);
        }

        // 3. 创建记录
        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'New Inquiry from Website', // 设置一个默认主题
            'message' => $message,
            'meta_data' => $metaData, // 确保你的 Model casts 中 meta_data 是 'array' 或 'json'
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        // ================== 新增部分：发送邮件 ==================

        try {
            // 从数据库获取接收邮箱（假设你的 Setting 模型有获取方法，或者是单例模式）
            // 如果你的 BaseController 已经共享了 $this->data['settings']，也可以直接用
            // 这里为了保险，直接查询数据库。假设 settings 表里有一列叫 contact_email

            // 方式 A：如果 Setting 是单一记录表
            // $adminEmail = Setting::first()->contact_email;

            // 方式 B：如果你的 BaseController 里的 $settings 是对象
            $settings = app(GeneralSettings::class);
            $adminEmail = $settings->contact_email ?? null;

            // 检查邮箱是否存在，存在则发送
            if ($adminEmail) {
                // 如果接收邮箱可能有多个（逗号分隔），可以转成数组
                $emails = array_map('trim', explode(',', $adminEmail));

                Mail::to($emails)->send(new NewInquiryNotification($enquiry));
            } else {
                Log::warning('未配置管理员接收邮箱 (contact_email)，询盘邮件发送失败。ID: ' . $enquiry->id);
            }
        } catch (\Exception $e) {
            // 捕获异常，防止邮件发送失败导致页面报错（用户端应显示提交成功，但后台记录日志）
            Log::error('询盘邮件发送异常: ' . $e->getMessage());
        }

        // =======================================================
        // 4. 跳转到成功页，再自动返回来源页面
        $returnTo = $this->sanitizeReturnTo(
            $validated['return_to'] ?? null,
            route('inquire.form', ['lang' => $lang])
        );

        return redirect()->route('inquire.success', [
            'lang' => $lang,
            'return_to' => $returnTo,
        ]);
    }

    public function captchaImage(Request $request, string $lang, string $captchaId)
    {
        if (!$this->isCaptchaEnabled()) {
            abort(404);
        }

        $binary = InquiryCaptcha::renderPng($request->session(), $captchaId);

        if (!$binary) {
            abort(404);
        }

        return response($binary, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    public function captchaRefresh(Request $request, string $lang)
    {
        if (!$this->isCaptchaEnabled()) {
            return response()->json([
                'message' => 'captcha_disabled',
            ], 404);
        }

        $captcha = InquiryCaptcha::generate($request->session());
        $captchaId = $captcha['id'] ?? null;

        if (!$captchaId) {
            return response()->json([
                'message' => 'captcha_generate_failed',
            ], 500);
        }

        return response()->json([
            'id' => $captchaId,
            'image_url' => route('inquire.captcha', ['lang' => $lang, 'captchaId' => $captchaId]),
        ]);
    }

    private function captchaInvalidMessage(): string
    {
        $messages = [
            'en' => 'Captcha is incorrect or expired. Please try again.',
            'zh' => '图形验证码错误或已过期，请重新填写。',
            'fr' => 'Le captcha est incorrect ou expire. Veuillez reessayer.',
            'es' => 'El captcha es incorrecto o ha expirado. Intentalo de nuevo.',
            'ru' => 'Капча неверна или истекла. Пожалуйста, попробуйте снова.',
            'ar' => 'رمز التحقق غير صحيح او منتهي الصلاحية. يرجى المحاولة مرة اخرى.',
        ];

        $locale = app()->getLocale();

        return $messages[$locale] ?? $messages['en'];
    }

    private function isCaptchaEnabled(): bool
    {
        return (bool) (app(GeneralSettings::class)->captcha_enabled ?? true);
    }

    private function sanitizeReturnTo(?string $returnTo, string $fallback): string
    {
        if (!is_string($returnTo) || $returnTo === '') {
            return $fallback;
        }

        $parts = parse_url($returnTo);

        if ($parts === false) {
            return $fallback;
        }

        if (!isset($parts['scheme'], $parts['host'])) {
            return str_starts_with($returnTo, '/') ? $returnTo : $fallback;
        }

        return $parts['host'] === request()->getHost() ? $returnTo : $fallback;
    }
}
