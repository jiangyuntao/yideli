<?php

namespace App\Console\Commands;

use App\Exceptions\TranslationException;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductTag;
use App\Services\ProductFormTranslationService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Throwable;

class TranslateManagedContent extends Command
{
    protected $signature = 'content:translate-managed
        {--type=* : Limit to product-tags,categories,products,news-categories,news,pages}
        {--overwrite : Overwrite existing translations instead of filling blanks only}
        {--retry-wait=10 : Seconds to wait before retrying a failed translation request}
        {--dry-run : Preview the translation pass without saving changes}';

    protected $description = 'Run the translation flow for managed content records.';

    protected array $definitions = [
        'product-tags' => [
            'label' => '产品标签',
            'model' => ProductTag::class,
            'fields' => ['name'],
            'source_field' => 'name',
        ],
        'categories' => [
            'label' => '产品分类',
            'model' => Category::class,
            'fields' => ['name', 'slug', 'description'],
            'source_field' => 'name',
        ],
        'products' => [
            'label' => '产品',
            'model' => Product::class,
            'fields' => [
                'name',
                'slug',
                'description',
                'content',
                'material',
                'size',
                'inner_page_color',
                'inner_page_paper_weight',
                'inner_page_sheet_count',
                'moq',
                'lead_time',
            ],
            'source_field' => 'name',
        ],
        'news-categories' => [
            'label' => '新闻分类',
            'model' => NewsCategory::class,
            'fields' => ['name', 'slug', 'description'],
            'source_field' => 'name',
        ],
        'news' => [
            'label' => '新闻',
            'model' => News::class,
            'fields' => ['title', 'slug', 'excerpt', 'content', 'tags'],
            'source_field' => 'title',
        ],
        'pages' => [
            'label' => '单页面',
            'model' => Page::class,
            'fields' => ['title', 'slug', 'content'],
            'source_field' => 'title',
        ],
    ];

    public function handle(ProductFormTranslationService $translationService): int
    {
        $selectedTypes = $this->resolveSelectedTypes();

        if ($selectedTypes === null) {
            return self::INVALID;
        }

        $overwrite = (bool) $this->option('overwrite');
        $dryRun = (bool) $this->option('dry-run');
        $retryWaitSeconds = $this->resolveRetryWaitSeconds();
        $summaries = [];
        $hasFailures = false;

        foreach ($selectedTypes as $type) {
            $definition = $this->definitions[$type];
            $this->newLine();
            $this->info("处理 {$definition['label']}...");

            $summary = $this->processType($type, $definition, $translationService, $overwrite, $dryRun, $retryWaitSeconds);
            $summaries[] = $summary;
            $hasFailures = $hasFailures || ($summary['failed_records'] > 0);
        }

        $this->newLine();
        $this->table(
            ['类型', '记录数', '更新记录', '回填项', '失败记录'],
            array_map(static fn (array $summary): array => [
                $summary['label'],
                $summary['processed_records'],
                $summary['updated_records'],
                $summary['updated_items'],
                $summary['failed_records'],
            ], $summaries),
        );

        if ($dryRun) {
            $this->comment('以上为 dry-run 结果，未写入数据库。');
        }

        return $hasFailures ? self::FAILURE : self::SUCCESS;
    }

    protected function resolveSelectedTypes(): ?array
    {
        $types = $this->option('type');

        if (empty($types)) {
            return array_keys($this->definitions);
        }

        $unknown = array_values(array_diff($types, array_keys($this->definitions)));

        if ($unknown !== []) {
            $this->error('未知类型：'.implode(', ', $unknown));
            $this->line('可用类型：'.implode(', ', array_keys($this->definitions)));

            return null;
        }

        return $types;
    }

    protected function resolveRetryWaitSeconds(): int
    {
        $retryWaitSeconds = (int) $this->option('retry-wait');

        if ($retryWaitSeconds < 1) {
            $this->warn('`--retry-wait` 小于 1，已自动改为 1 秒。');

            return 1;
        }

        return $retryWaitSeconds;
    }

    protected function processType(
        string $type,
        array $definition,
        ProductFormTranslationService $translationService,
        bool $overwrite,
        bool $dryRun,
        int $retryWaitSeconds,
    ): array {
        $modelClass = $definition['model'];
        $fields = $definition['fields'];
        $sourceField = $definition['source_field'];
        $summary = [
            'label' => $definition['label'],
            'processed_records' => 0,
            'updated_records' => 0,
            'updated_items' => 0,
            'failed_records' => 0,
        ];

        /** @var class-string<Model> $modelClass */
        $modelClass::query()
            ->orderBy('id')
            ->chunkById(50, function ($records) use (
                $type,
                $fields,
                $sourceField,
                $translationService,
                $overwrite,
                $dryRun,
                $retryWaitSeconds,
                &$summary
            ): void {
                foreach ($records as $record) {
                    $summary['processed_records']++;

                    try {
                        $result = $this->translateRecordWithRetry(
                            type: $type,
                            record: $record,
                            fields: $fields,
                            sourceField: $sourceField,
                            translationService: $translationService,
                            overwrite: $overwrite,
                            retryWaitSeconds: $retryWaitSeconds,
                        );
                    } catch (Throwable $exception) {
                        $summary['failed_records']++;

                        Log::error('Managed content translation failed unexpectedly.', [
                            'type' => $type,
                            'record_id' => $record->getKey(),
                            'exception' => $exception,
                        ]);

                        $this->warn("  #{$record->getKey()} 翻译失败：{$exception->getMessage()}");

                        continue;
                    }

                    if ($result['updated_items'] === 0) {
                        continue;
                    }

                    $summary['updated_records']++;
                    $summary['updated_items'] += $result['updated_items'];

                    if ($dryRun) {
                        $this->line("  [dry-run] #{$record->getKey()} {$result['updated_items']} 项");

                        continue;
                    }

                    foreach ($result['state'] as $field => $value) {
                        $record->setAttribute($field, $value);
                    }

                    $record->saveQuietly();
                    $this->line("  #{$record->getKey()} 已回填 {$result['updated_items']} 项");
                }
            });

        return $summary;
    }

    protected function translateRecord(
        Model $record,
        array $fields,
        string $sourceField,
        ProductFormTranslationService $translationService,
        bool $overwrite,
    ): array {
        $state = [];
        $allowedFields = $this->resolveAllowedFields($record, $fields);

        foreach ($fields as $field) {
            $state[$field] = $this->getTranslations($record, $field);
        }

        $updatedItems = 0;

        foreach ($fields as $field) {
            $sourceTranslations = $state[$sourceField] ?? $this->getTranslations($record, $sourceField);
            $slugTranslations = in_array('slug', $fields, true)
                ? ($state['slug'] ?? $this->getTranslations($record, 'slug'))
                : null;

            $result = $translationService->translateField(
                field: $field,
                translations: $state[$field] ?? $this->getTranslations($record, $field),
                nameTranslations: $sourceField === 'name' ? $sourceTranslations : null,
                slugTranslations: $slugTranslations,
                overwrite: $overwrite,
                sourceTranslations: $sourceTranslations,
            );

            $state[$field] = $result['value'];
            $updatedItems += $result['updated_count'];

            foreach ($result['extra'] as $extraField => $extraValue) {
                if (! in_array($extraField, $allowedFields, true)) {
                    continue;
                }

                $state[$extraField] = $extraValue;
            }
        }

        return [
            'state' => $state,
            'updated_items' => $updatedItems,
        ];
    }

    protected function translateRecordWithRetry(
        string $type,
        Model $record,
        array $fields,
        string $sourceField,
        ProductFormTranslationService $translationService,
        bool $overwrite,
        int $retryWaitSeconds,
    ): array {
        $attempt = 0;

        while (true) {
            $attempt++;

            try {
                return $this->translateRecord(
                    $record,
                    $fields,
                    $sourceField,
                    $translationService,
                    $overwrite,
                );
            } catch (TranslationException $exception) {
                Log::warning('Managed content translation hit a retryable translation exception.', [
                    'type' => $type,
                    'record_id' => $record->getKey(),
                    'attempt' => $attempt,
                    'retry_wait_seconds' => $retryWaitSeconds,
                    'message' => $exception->getMessage(),
                ]);

                $this->warn(
                    "  #{$record->getKey()} 翻译失败：{$exception->getMessage()}，{$retryWaitSeconds} 秒后重试（第 {$attempt} 次）"
                );

                sleep($retryWaitSeconds);
            }
        }
    }

    protected function getTranslations(Model $record, string $field): array
    {
        if (! method_exists($record, 'getTranslations')) {
            return [];
        }

        return $record->getTranslations($field);
    }

    protected function resolveAllowedFields(Model $record, array $defaultFields): array
    {
        if (method_exists($record, 'getTranslatableAttributes')) {
            return $record->getTranslatableAttributes();
        }

        return $defaultFields;
    }
}
