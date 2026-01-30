<?php

namespace App\Http\Controllers\Index;

use App\Mail\NewInquiryNotification;
use App\Models\Enquiry;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InquireController extends BaseController
{
    public function form(Request $request)
    {
        return view('index.inquire.form', $this->data);
    }

    public function submit(Request $request, $lang)
    {
        // 1. 验证数据
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            // 注意：interest 在表单中是多选，验证为数组
            'interest' => 'nullable|array',
            'message' => 'required|string',
        ]);

        // 2. 整理元数据 (存入 meta_data JSON 字段)
        $metaData = [
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'interest' => $validated['interest'] ?? [],
        ];

        // 3. 创建记录
        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'New Inquiry from Website', // 设置一个默认主题
            'message' => $validated['message'],
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
        // 4. 返回成功信息
        // 这里的提示语建议放入语言包 resources/lang/en/inquire.php
        return redirect()->back()->with('success', __('inquire.submit_success'));
    }
}
