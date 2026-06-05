<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

beforeEach(function () {
    Schema::dropIfExists('products');
    Schema::dropIfExists('categories');

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

