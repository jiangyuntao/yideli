<!-- resources/views/filament/resources/language-lines/batch-import-modal.blade.php -->
<div class="space-y-4">
    <div>
        <h3 class="text-lg font-medium">CSV 文件格式要求</h3>
        <p class="mt-2 text-sm text-gray-600">
            CSV 文件的第一行必须包含以下列标题：
        </p>
        <ul class="mt-2 space-y-1 list-disc list-inside text-sm text-gray-600">
            <li><code>group</code> - 翻译分组（必填）</li>
            <li><code>key</code> - 翻译键名（必填）</li>
            <li><code>zh</code> - 中文原文（必填）</li>
        </ul>
    </div>

    <div>
        <h3 class="text-lg font-medium">示例 CSV 内容</h3>
        <pre class="mt-2 p-3 bg-gray-50 rounded text-xs overflow-x-auto">
"group","key","zh"
"menu","home","首页"
"menu","about","关于我们"
"buttons","submit","提交"</pre>
    </div>

    <div class="text-sm text-gray-600">
        <p>注意：</p>
        <ul class="list-disc list-inside mt-1 space-y-1">
            <li>导入后，您可以使用"AI 补全翻译"功能为其他语言生成翻译</li>
            <li>如果记录已存在，仅更新中文翻译内容</li>
            <li>支持的文件类型：CSV (.csv)</li>
            <li>最大文件大小：10MB</li>
            <li>导入过程可能需要一些时间，请耐心等待</li>
        </ul>
    </div>
</div>