<?php

namespace App\Support;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;

class InquiryCaptcha
{
    private const SESSION_KEY = 'inquiry_captcha_pool';
    private const TTL_SECONDS = 1800;

    public static function generate(Session $session): array
    {
        $equation = self::makeEquation();
        $captchaId = (string) Str::uuid();

        $pool = self::cleanupExpired($session->get(self::SESSION_KEY, []));
        $pool[$captchaId] = [
            'expression' => $equation['expression'],
            'answer' => $equation['answer'],
            'expires_at' => time() + self::TTL_SECONDS,
        ];

        $session->put(self::SESSION_KEY, $pool);

        return [
            'id' => $captchaId,
        ];
    }

    public static function validate(Session $session, ?string $captchaId, ?string $input): bool
    {
        if (!$captchaId || $input === null) {
            return false;
        }

        $pool = self::cleanupExpired($session->get(self::SESSION_KEY, []));
        $record = $pool[$captchaId] ?? null;

        if (!is_array($record) || !isset($record['answer'])) {
            $session->put(self::SESSION_KEY, $pool);
            return false;
        }

        unset($pool[$captchaId]);
        $session->put(self::SESSION_KEY, $pool);

        $normalized = trim((string) $input);
        if (!preg_match('/^-?\d+$/', $normalized)) {
            return false;
        }

        return ((int) $normalized === (int) $record['answer']);
    }

    public static function renderPng(Session $session, string $captchaId): ?string
    {
        $pool = self::cleanupExpired($session->get(self::SESSION_KEY, []));
        $record = $pool[$captchaId] ?? null;

        $session->put(self::SESSION_KEY, $pool);

        if (!is_array($record) || empty($record['answer'])) {
            return null;
        }

        $expression = (string) ($record['expression'] ?? '');
        if ($expression === '') {
            return null;
        }

        return self::drawCaptchaImage($expression);
    }

    private static function cleanupExpired(array $pool): array
    {
        $now = time();

        return array_filter($pool, static function ($item) use ($now) {
            return is_array($item)
                && isset($item['expires_at'])
                && (int) $item['expires_at'] >= $now;
        });
    }

    private static function makeEquation(): array
    {
        $left = random_int(1, 20);
        $right = random_int(1, 20);
        $operator = random_int(0, 1) === 0 ? '+' : '-';

        if ($operator === '-' && $right > $left) {
            [$left, $right] = [$right, $left];
        }

        $answer = $operator === '+'
            ? $left + $right
            : $left - $right;

        return [
            'expression' => "{$left}{$operator}{$right}=?",
            'answer' => (string) $answer,
        ];
    }

    private static function drawCaptchaImage(string $expression): string
    {
        $width = 190;
        $height = 64;

        $image = imagecreatetruecolor($width, $height);

        if (!$image) {
            return '';
        }

        imagealphablending($image, true);
        imagesavealpha($image, true);

        $background = imagecolorallocate($image, 247, 250, 245);
        imagefill($image, 0, 0, $background);

        self::drawNoise($image, $width, $height);
        self::drawExpression($image, $expression, $width, $height);

        ob_start();
        imagepng($image);
        $binary = (string) ob_get_clean();
        imagedestroy($image);

        return $binary;
    }

    private static function drawNoise($image, int $width, int $height): void
    {
        for ($i = 0; $i < 8; $i++) {
            $color = imagecolorallocatealpha(
                $image,
                random_int(120, 200),
                random_int(120, 200),
                random_int(120, 200),
                random_int(75, 105)
            );

            imageline(
                $image,
                random_int(0, $width),
                random_int(0, $height),
                random_int(0, $width),
                random_int(0, $height),
                $color
            );
        }

        for ($i = 0; $i < 1000; $i++) {
            $color = imagecolorallocatealpha(
                $image,
                random_int(110, 210),
                random_int(110, 210),
                random_int(110, 210),
                random_int(80, 120)
            );

            imagesetpixel(
                $image,
                random_int(0, $width - 1),
                random_int(0, $height - 1),
                $color
            );
        }
    }

    private static function drawExpression($image, string $expression, int $width, int $height): void
    {
        $fonts = self::resolveUsableFonts();
        $chars = str_split($expression);
        $count = count($chars);
        $cellWidth = (int) floor(($width - 18) / max(1, $count));

        foreach ($chars as $index => $char) {
            $x = 8 + ($index * $cellWidth) + random_int(0, max(2, (int) floor($cellWidth * 0.15)));
            $y = random_int(41, 52);
            $angle = random_int(-16, 16);

            $color = imagecolorallocate(
                $image,
                random_int(30, 85),
                random_int(55, 110),
                random_int(40, 95)
            );

            if (!empty($fonts) && function_exists('imagettftext')) {
                $font = $fonts[random_int(0, count($fonts) - 1)];
                $fontSize = random_int(23, 30);
                $result = imagettftext($image, $fontSize, $angle, $x, $y, $color, $font, $char);

                if ($result === false) {
                    imagestring($image, random_int(4, 5), $x, random_int(18, 28), $char, $color);
                }
            } else {
                imagestring($image, random_int(4, 5), $x, random_int(18, 28), $char, $color);
            }
        }
    }

    private static function resolveUsableFonts(): array
    {
        $directories = [
            resource_path('fonts/captcha'),
            public_path('fonts/captcha'),
            '/usr/share/fonts/truetype/dejavu',
            '/usr/share/fonts/truetype/liberation',
            '/usr/share/fonts/truetype/freefont',
            '/System/Library/Fonts/Supplemental',
            '/System/Library/Fonts',
            '/Library/Fonts',
        ];

        $fonts = [];
        $blocked = '/(symbol|ding|emoji|webdings|wingdings|zapf)/i';
        $preferred = '/(arial|verdana|trebuchet|georgia|times|courier|helvetica|dejavu|liberation|freesans|inter|lato|roboto|ubuntu|sourcesans|sfns)/i';

        foreach ($directories as $directory) {
            if (!is_dir($directory)) {
                continue;
            }

            $found = glob($directory . '/*.{ttf,otf,TTF,OTF}', GLOB_BRACE) ?: [];

            foreach ($found as $path) {
                if (!is_file($path) || !is_readable($path)) {
                    continue;
                }

                if (preg_match($blocked, basename($path))) {
                    continue;
                }

                $fonts[$path] = $path;
            }
        }

        $all = array_values($fonts);
        $preferredFonts = array_values(array_filter($all, static function ($path) use ($preferred) {
            return preg_match($preferred, basename($path)) === 1;
        }));

        if (!empty($preferredFonts)) {
            return array_slice($preferredFonts, 0, 24);
        }

        return array_slice($all, 0, 24);
    }
}
