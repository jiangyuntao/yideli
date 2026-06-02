<?php

use App\Http\Controllers\Index\ProductController;
use App\Models\Product;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

beforeEach(function () {
    Schema::dropIfExists('product_access_code_product');
    Schema::dropIfExists('product_related');
    Schema::dropIfExists('product_access_codes');
    Schema::dropIfExists('products');
    Schema::dropIfExists('categories');

    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->text('name')->nullable();
        $table->text('slug')->nullable();
        $table->boolean('is_visible')->default(true);
        $table->integer('sort_order')->default(0);
        $table->text('description')->nullable();
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id')->nullable();
        $table->text('name')->nullable();
        $table->text('slug')->nullable();
        $table->text('images')->nullable();
        $table->text('description')->nullable();
        $table->text('content')->nullable();
        $table->text('specifications')->nullable();
        $table->text('code')->nullable();
        $table->text('material')->nullable();
        $table->text('size')->nullable();
        $table->text('inner_pages')->nullable();
        $table->text('moq')->nullable();
        $table->text('lead_time')->nullable();
        $table->text('tags')->nullable();
        $table->boolean('is_visible')->default(true);
        $table->string('translation_status')->nullable();
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('product_access_codes', function (Blueprint $table) {
        $table->id();
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
    });

    Schema::create('product_access_code_product', function (Blueprint $table) {
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('product_access_code_id');
    });

    Schema::create('product_related', function (Blueprint $table) {
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('related_product_id');
    });
});

it('falls back to the product id for route links when slug is missing', function () {
    DB::table('categories')->insert([
        'id' => 1,
        'name' => json_encode(['en' => 'Category']),
        'slug' => json_encode(['en' => 'category']),
        'is_visible' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('products')->insert([
        'id' => 7,
        'category_id' => 1,
        'name' => json_encode(['en' => 'Fallback Product']),
        'slug' => json_encode(['en' => null]),
        'is_visible' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    App::setLocale('en');

    $product = Product::query()->findOrFail(7);

    expect($product->route_slug)->toBe('7');
});

it('resolves a visible product by id when slug is missing', function () {
    DB::table('categories')->insert([
        'id' => 1,
        'name' => json_encode(['en' => 'Category']),
        'slug' => json_encode(['en' => 'category']),
        'is_visible' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('products')->insert([
        [
            'id' => 7,
            'category_id' => 1,
            'name' => json_encode(['en' => 'Visible Product']),
            'slug' => json_encode(['en' => null]),
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 99,
            'category_id' => 1,
            'name' => json_encode(['en' => 'Hidden Product']),
            'slug' => json_encode(['en' => '7']),
            'is_visible' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);

    App::setLocale('en');

    $response = app(ProductController::class)->show(
        Request::create('/en/product/7', 'GET'),
        'en',
        '7',
    );

    expect($response)->toBeInstanceOf(View::class);
    expect($response->getData()['product']->id)->toBe(7);
    expect($response->getData()['hasAccess'])->toBeTrue();
});
