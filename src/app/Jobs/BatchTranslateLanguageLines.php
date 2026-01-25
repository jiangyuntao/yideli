<?php

namespace App\Jobs;

use App\Filament\Resources\LanguageLines\Tables\LanguageLinesTable;
use App\Services\YoudaoTranslate;
use Filament\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\TranslationLoader\LanguageLine;
use Illuminate\Queue\Middleware\WithoutOverlapping;

class BatchTranslateLanguageLines implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 任务最大尝试次数
     * 防止有道API临时故障导致任务永久失败
     */
    public $tries = 3;

    /**
     * 每次尝试后的延迟时间（秒）
     */
    public $backoff = 5;

    /**
     * 要翻译的语言行记录集合
     * @var \Illuminate\Database\Eloquent\Collection<LanguageLine>
     */
    protected $languageLines;

    /**
     * 创建新的任务实例
     * 接收LanguageLine集合，SerializesModels会自动序列化模型，避免内存溢出
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $languageLines
     * @return void
     */
    public function __construct($languageLines)
    {
        $this->languageLines = $languageLines;
        // // 任务归属队列（可选，方便单独管理翻译任务）
        // $this->onQueue('translation');
    }

    /**
     * 任务中间件
     * WithoutOverlapping：防止同一批翻译任务重复执行（基于翻译分组唯一标识）
     *
     * @return array
     */
    public function middleware()
    {
        return [new WithoutOverlapping('batch-translation-' . md5($this->languageLines->pluck('id')->implode(',')))];
    }

    /**
     * 执行任务
     * 依赖注入YoudaoTranslate服务，与原有逻辑保持一致
     *
     * @param  YoudaoTranslate  $translator
     * @return void
     */
    public function handle(YoudaoTranslate $translator)
    {
        // 初始化执行结果统计
        $successCount = 0;
        $failCount = 0;
        $failIds = [];

        // 遍历翻译记录，单个记录异常不中断整个任务
        foreach ($this->languageLines as $line) {
            try {
                // 复用原有核心翻译方法，无需重复写逻辑
                LanguageLinesTable::processTranslation($line, $translator);
                $successCount++;
            } catch (\Exception $e) {
                // 记录失败的记录ID和异常信息，方便排查
                report($e); // 将异常写入Laravel日志（storage/logs/laravel.log）
                $failCount++;
                $failIds[] = $line->id;
                continue;
            }
        }

        // 发送任务完成通知（Filament原生通知，支持后台弹窗）
        $this->sendCompletionNotification($successCount, $failCount, $failIds);
    }

    /**
     * 发送翻译完成通知
     * 适配Filament后台，区分成功/部分失败/全部失败状态
     *
     * @param  int  $successCount
     * @param  int  $failCount
     * @param  array  $failIds
     * @return void
     */
    protected function sendCompletionNotification(int $successCount, int $failCount, array $failIds)
    {
        $notification = Notification::make()
            ->title('批量AI翻译任务执行完成');

        // 全部成功
        if ($failCount === 0) {
            $notification
                ->success()
                ->body("共成功翻译 {$successCount} 条记录，所有翻译已同步至数据库并刷新缓存");
        }
        // 部分失败
        else {
            $notification
                ->warning()
                ->body("共处理 {bcadd($successCount, $failCount, 0)} 条记录，成功 {$successCount} 条，失败 {$failCount} 条。\n失败记录ID：" . implode(', ', $failIds) . "\n请查看日志排查问题（storage/logs/laravel.log）");
        }

        // 发送通知（队列环境下也能正常显示在Filament后台）
        $notification->send();
    }

    /**
     * 任务失败时的处理
     * 记录最终失败的任务信息，发送失败通知
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(\Exception $exception)
    {
        // 将失败异常写入日志
        report($exception);

        // 发送任务整体失败通知
        Notification::make()
            ->title('批量AI翻译任务执行失败')
            ->danger()
            ->body("任务经过 {$this->tries} 次尝试后仍失败，原因：{$exception->getMessage()}\n请检查有道翻译API配置或网络连接，查看日志获取详细信息")
            ->send();
    }
}
