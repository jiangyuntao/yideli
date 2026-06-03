<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('category_id');
            }
        });

        $sortOrder = 1;

        DB::table('products')
            ->orderBy('id')
            ->select('id')
            ->get()
            ->each(function (object $product) use (&$sortOrder): void {
                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['sort_order' => $sortOrder++]);
            });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};
