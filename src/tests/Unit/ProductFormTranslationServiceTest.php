<?php

use App\Services\ProductFormTranslationService;
use App\Services\YoudaoTranslate;

it('translates the product name field and updates localized slugs', function () {
    $translator = new class extends YoudaoTranslate
    {
        public function translate($text, $from, $to)
        {
            return "{$to} {$text}";
        }
    };

    $service = new ProductFormTranslationService($translator);

    $result = $service->translateField(
        field: 'name',
        translations: ['zh' => 'Desk Calendar'],
        slugTranslations: ['zh' => 'desk-calendar'],
    );

    expect($result['value']['en'])->toBe('en Desk Calendar')
        ->and($result['extra']['slug']['en'])->toBe('en-desk-calendar')
        ->and($result['extra']['slug']['ar'])->toBe('ar-desk-calendar')
        ->and($result['updated_count'])->toBeGreaterThan(0);
});

it('preserves existing field translations and falls back to the first populated locale', function () {
    $translator = new class extends YoudaoTranslate
    {
        public function translate($text, $from, $to)
        {
            return "{$from}-to-{$to} {$text}";
        }
    };

    $service = new ProductFormTranslationService($translator);

    $result = $service->translateField(
        field: 'description',
        translations: ['en' => 'Weekly layout', 'fr' => 'Description manuelle'],
    );

    expect($result['value']['fr'])->toBe('Description manuelle')
        ->and($result['value']['zh'])->toBe('en-to-zh-CHS Weekly layout')
        ->and($result['value']['ru'])->toBe('en-to-ru Weekly layout')
        ->and($result['updated_count'])->toBe(4);
});

it('generates slug translations from existing localized names', function () {
    $translator = new class extends YoudaoTranslate
    {
        public function translate($text, $from, $to)
        {
            return $text;
        }
    };

    $service = new ProductFormTranslationService($translator);

    $result = $service->translateField(
        field: 'slug',
        translations: ['fr' => 'agenda-manuel'],
        nameTranslations: [
            'en' => 'Planner',
            'fr' => 'Agenda manuel',
        ],
    );

    expect($result['value']['fr'])->toBe('agenda-manuel')
        ->and($result['value']['en'])->toBe('planner')
        ->and($result['updated_count'])->toBe(1);
});
