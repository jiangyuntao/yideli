<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use App\Models\News;
use App\Settings\GeneralSettings;
use App\Support\InquiryCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends BaseController
{
    public function index(Request $request)
    {
        $captchaEnabled = (bool) (app(GeneralSettings::class)->captcha_enabled ?? true);
        $this->data['inquiryCaptcha'] = $captchaEnabled ? InquiryCaptcha::generate($request->session()) : null;

        $this->data['categories'] = Category::whereNull('parent_id')
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        $locale = App::getLocale();

        $this->data['caseStudies'] = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->limit(4)
            ->get()
            ->map(function (News $entry) use ($locale) {
                $slug = $entry->getTranslation('slug', $locale, false)
                    ?: $entry->getTranslation('slug', 'en', false);

                if (!$slug) {
                    return null;
                }

                return [
                    'title' => $entry->getTranslation('title', $locale, false)
                        ?: $entry->getTranslation('title', 'en', false),
                    'excerpt' => $entry->getTranslation('excerpt', $locale, false)
                        ?: $entry->getTranslation('excerpt', 'en', false),
                    'slug' => $slug,
                    'cover_image' => $entry->cover_image,
                ];
            })
            ->filter()
            ->values();

        return view('index.index.index', $this->data);
    }
}
