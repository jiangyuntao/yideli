<?php

namespace App\Jobs;

use App\Services\YoudaoTranslateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoTranslateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;

    // 目标语言映射 (Youdao code vs Laravel locale)
    // 假设 Laravel locale: zh, en, fr, es, ru, ar
    // 有道代码: zh-CHS, en, fr, es, ru, ar
    protected array $targetLocales = ['en', 'fr', 'es', 'ru', 'ar'];

    /**
     * Create a new job instance.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     */
    public function handle(YoudaoTranslateService $translator): void
    {
        // 1. 更新状态为进行中
        $this->model->update(['translation_status' => 'translating']);

        try {
            // 获取源语言内容 (假设后台录入的是中文)
            // 注意：Spatie Translatable 获取原始值的方法
            $sourceLocale = 'zh';

            foreach ($this->targetLocales as $locale) {
                $fields = $this->model->getTranslatableAttributes();
                foreach ($fields as $field) {
                    if ($field == 'slug') {
                        continue;
                    }

                    // 获取中文原文
                    // 使用 getTranslation 获取指定语言的值，避免获取到 fallback
                    $sourceText = $this->model->getTranslation($field, $sourceLocale, false);

                    if ($sourceText) {
                        // 调用有道翻译
                        // 有道源语言写 zh-CHS，目标语言看文档对应
                        $translatedText = $translator->translate($sourceText, 'zh-CHS', $locale);

                        if ($translatedText && isset($translatedText['translation'])) {
                            // 写入翻译结果
                            $this->model->setTranslation($field, $locale, implode('', $translatedText['translation']));
                        }

                        // 防止访问频率受限
                        sleep(1);
                    }
                }
            }

            // 2. 全部循环结束后，保存并更新状态
            $this->model->translation_status = 'completed';
            $this->model->saveQuietly(); // 使用 saveQuietly 防止死循环 (如果有 Observer 监听 updated)

        } catch (\Exception $e) {
            Log::error('Auto Translate Job Failed: ' . $e->getMessage());
            $this->model->update(['translation_status' => 'failed']);
        }
    }
}
