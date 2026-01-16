<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoFillSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;

    protected array $targetLocales = ['zh', 'en', 'fr', 'es', 'ru', 'ar'];

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
    public function handle(): void
    {
        try {
            if (isset($this->model->title)) {
                $titleField = 'title';
            } else {
                $titleField = 'name';
            }

            foreach ($this->targetLocales as $locale) {
                if (!$this->model->getTranslation('slug', $locale, false)) {
                    $slug = Str::slug($this->model->getTranslation($titleField, $locale, false), '-', $locale);
                    $this->model->setTranslation('slug', $locale, $slug);
                }
            }

            $this->model->saveQuietly();
        } catch (\Exception $e) {
            Log::error('Auto Translate Job Failed: ' . $e->getMessage());
        }
    }
}
