<?php

namespace App\Http\Controllers\Index;

use App\Models\Enquiry;
use Illuminate\Http\Request;

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
        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'New Inquiry from Website', // 设置一个默认主题
            'message' => $validated['message'],
            'meta_data' => $metaData, // 确保你的 Model casts 中 meta_data 是 'array' 或 'json'
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        // 4. 返回成功信息
        // 这里的提示语建议放入语言包 resources/lang/en/inquire.php
        return redirect()->back()->with('success', __('inquire.submit_success'));
    }
}
