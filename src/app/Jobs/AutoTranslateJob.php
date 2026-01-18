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

                    $sourceText = $this->model->getTranslation($field, $sourceLocale, false);

                    if ($sourceText) {
                        if (is_array($sourceText)) {
                            $translatedArray = [];

                            foreach ($sourceText as $item) {
                                if (!is_string($item) || $item === '') {
                                    $translatedArray[] = $item;
                                    continue;
                                }

                                $translatedText = $translator->translate($item, 'zh-CHS', $locale);

                                if ($translatedText && isset($translatedText['translation'])) {
                                    $translatedArray[] = implode('', $translatedText['translation']);
                                } else {
                                    $translatedArray[] = $item;
                                }

                                sleep(1);
                            }

                            $this->model->setTranslation($field, $locale, $translatedArray);
                        } else {
                            $translatedText = $translator->translate($sourceText, 'zh-CHS', $locale);

                            if ($translatedText && isset($translatedText['translation'])) {
                                $this->model->setTranslation($field, $locale, implode('', $translatedText['translation']));
                            }

                            sleep(1);
                        }
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
