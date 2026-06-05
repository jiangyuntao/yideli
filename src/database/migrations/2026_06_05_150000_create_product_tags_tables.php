<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_tag_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['product_id', 'product_tag_id']);
        });

        $seedTags = [
            'new' => [
                'name' => [
                    'zh' => '最新',
                    'en' => 'New',
                    'fr' => 'Nouveau',
                    'es' => 'Nuevo',
                    'ru' => 'Новинка',
                    'ar' => 'جديد',
                ],
                'sort_order' => 1,
            ],
            'best_seller' => [
                'name' => [
                    'zh' => '热销',
                    'en' => 'Best Seller',
                    'fr' => 'Meilleure vente',
                    'es' => 'Mas vendido',
                    'ru' => 'Хит продаж',
                    'ar' => 'الاكثر مبيعا',
                ],
                'sort_order' => 2,
            ],
        ];

        $tagIdsByLegacyKey = [];

        foreach ($seedTags as $legacyKey => $tag) {
            $tagIdsByLegacyKey[$legacyKey] = DB::table('product_tags')->insertGetId([
                'name' => json_encode($tag['name'], JSON_UNESCAPED_UNICODE),
                'sort_order' => $tag['sort_order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (! Schema::hasColumn('products', 'flags')) {
            return;
        }

        DB::table('products')
            ->select(['id', 'flags'])
            ->orderBy('id')
            ->get()
            ->each(function (object $product) use ($tagIdsByLegacyKey): void {
                $flags = $product->flags;

                if (is_string($flags)) {
                    $decoded = json_decode($flags, true);
                    $flags = is_array($decoded) ? $decoded : [];
                }

                if (! is_array($flags)) {
                    return;
                }

                foreach ($flags as $flag) {
                    $legacyKey = is_string($flag) ? Str::of($flag)->trim()->value() : null;

                    if (! $legacyKey || ! isset($tagIdsByLegacyKey[$legacyKey])) {
                        continue;
                    }

                    DB::table('product_tag_product')->updateOrInsert(
                        [
                            'product_id' => $product->id,
                            'product_tag_id' => $tagIdsByLegacyKey[$legacyKey],
                        ],
                        [
                            'created_at' => now(),
                            'updated_at' => now(),
                        ],
                    );
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tag_product');
        Schema::dropIfExists('product_tags');
    }
};
