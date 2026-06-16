<?php

namespace App\Services\YoudaoTranslate;

use Illuminate\Support\Facades\Cache;

class RequestThrottler
{
    public static function throttle(): void
    {
        $intervalMs = max(0, (int) config('services.youdao.request_interval_ms', 1200));

        if ($intervalMs === 0) {
            return;
        }

        Cache::lock('youdao:request-throttle-lock', 10)->block(10, function () use ($intervalMs): void {
            $lastRequestAtMs = (int) Cache::get('youdao:last-request-at-ms', 0);
            $nowMs = (int) floor(microtime(true) * 1000);
            $waitMs = max(0, $intervalMs - ($nowMs - $lastRequestAtMs));

            if ($waitMs > 0) {
                usleep($waitMs * 1000);
            }

            Cache::put(
                'youdao:last-request-at-ms',
                (int) floor(microtime(true) * 1000),
                now()->addMinutes(10),
            );
        });
    }
}
