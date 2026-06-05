<?php

use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

beforeEach(function () {
    Schema::dropIfExists('products');
    Schema::dropIfExists('categories');
    Schema::dropIfExists('news');
    Schema::dropIfExists('news_categories');
    Schema::dropIfExists('pages');

    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->text('name')->nullable();
        $table->text('slug')->nullable();
        $table->text('description')->nullable();
        $table->boolean('is_visible')->default(true);
        $table->integer('sort_order')->default(0);
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id')->nullable();
        $table->text('name')->nullable();
        $table->text('slug')->nullable();
        $table->text('description')->nullable();
        $table->text('content')->nullable();
        $table->text('specifications')->nullable();
        $table->text('material')->nullable();
        $table->text('size')->nullable();
        $table->text('inner_pages')->nullable();
        $table->text('inner_page_color')->nullable();
        $table->text('inner_page_paper_weight')->nullable();
        $table->text('inner_page_sheet_count')->nullable();
        $table->text('moq')->nullable();
        $table->text('lead_time')->nullable();
        $table->text('tags')->nullable();
        $table->text('translation_status')->nullable();
        $table->integer('sort_order')->default(0);
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('news_categories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->text('name')->nullable();
        $table->text('slug')->nullable();
        $table->text('description')->nullable();
        $table->text('seo_title')->nullable();
        $table->text('seo_keywords')->nullable();
        $table->integer('sort_order')->default(0);
        $table->boolean('is_visible')->default(true);
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('news', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id')->nullable();
        $table->text('title')->nullable();
        $table->text('slug')->nullable();
        $table->text('excerpt')->nullable();
        $table->text('content')->nullable();
        $table->text('tags')->nullable();
        $table->text('seo_title')->nullable();
        $table->text('seo_description')->nullable();
        $table->text('seo_keywords')->nullable();
        $table->string('cover_image')->nullable();
        $table->boolean('is_featured')->default(false);
        $table->timestamp('published_at')->nullable();
        $table->text('translation_status')->nullable();
        $table->integer('sort_order')->default(0);
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->text('title')->nullable();
        $table->text('slug')->nullable();
        $table->text('content')->nullable();
        $table->text('translation_status')->nullable();
        $table->integer('sort_order')->default(0);
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });
});

it('autofills blank product slug translations from the corresponding product name without overriding manual values', function () {
    Bus::fake();

    $product = Product::create([
        'name' => [
            'zh' => '测试产品',
            'en' => 'Test Product',
        ],
        'slug' => [
            'zh' => 'custom-product-slug',
            'en' => null,
        ],
    ]);

    expect($product->getTranslation('slug', 'zh'))->toBe('custom-product-slug');
    expect($product->getTranslation('slug', 'en'))->toBe(Str::slug('Test Product', '-', 'en'));
});

it('autofills blank category slug translations from the corresponding category name without overriding manual values', function () {
    $category = Category::create([
        'name' => [
            'zh' => '测试分类',
            'en' => 'Test Category',
        ],
        'slug' => [
            'zh' => null,
            'en' => 'custom-category-slug',
        ],
    ]);

    expect($category->getTranslation('slug', 'zh'))->toBe(Str::slug('测试分类', '-', 'zh'));
    expect($category->getTranslation('slug', 'en'))->toBe('custom-category-slug');
});

it('autofills blank news slug translations from the corresponding title without overriding manual values', function () {
    $news = News::create([
        'title' => [
            'zh' => '测试新闻标题',
            'en' => 'Test News Title',
        ],
        'slug' => [
            'zh' => null,
            'en' => 'custom-news-slug',
        ],
        'content' => [
            'zh' => '<p>内容</p>',
            'en' => '<p>Content</p>',
        ],
    ]);

    expect($news->getTranslation('slug', 'zh'))->toBe(Str::slug('测试新闻标题', '-', 'zh'));
    expect($news->getTranslation('slug', 'en'))->toBe('custom-news-slug');
});

it('autofills blank news category slug translations from the corresponding name without overriding manual values', function () {
    $category = NewsCategory::create([
        'name' => [
            'zh' => '测试新闻分类',
            'en' => 'Test News Category',
        ],
        'slug' => [
            'zh' => 'custom-news-category-slug',
            'en' => null,
        ],
    ]);

    expect($category->getTranslation('slug', 'zh'))->toBe('custom-news-category-slug');
    expect($category->getTranslation('slug', 'en'))->toBe(Str::slug('Test News Category', '-', 'en'));
});

it('autofills blank page slug translations from the corresponding title without overriding manual values', function () {
    $page = Page::create([
        'title' => [
            'zh' => '测试单页面标题',
            'en' => 'Test Page Title',
        ],
        'slug' => [
            'zh' => null,
            'en' => 'custom-page-slug',
        ],
        'content' => [
            'zh' => '<p>正文</p>',
            'en' => '<p>Content</p>',
        ],
    ]);

    expect($page->getTranslation('slug', 'zh'))->toBe(Str::slug('测试单页面标题', '-', 'zh'));
    expect($page->getTranslation('slug', 'en'))->toBe('custom-page-slug');
});
