<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'size')) {
                $table->json('size')->nullable()->after('material');
            }

            if (! Schema::hasColumn('products', 'inner_pages')) {
                $table->json('inner_pages')->nullable()->after('size');
            }

            if (! Schema::hasColumn('products', 'moq')) {
                $table->json('moq')->nullable()->after('inner_pages');
            }

            if (! Schema::hasColumn('products', 'lead_time')) {
                $table->json('lead_time')->nullable()->after('moq');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $dropColumns = array_values(array_filter([
                Schema::hasColumn('products', 'size') ? 'size' : null,
                Schema::hasColumn('products', 'inner_pages') ? 'inner_pages' : null,
                Schema::hasColumn('products', 'moq') ? 'moq' : null,
                Schema::hasColumn('products', 'lead_time') ? 'lead_time' : null,
            ]));

            if ($dropColumns !== []) {
                $table->dropColumn($dropColumns);
            }
        });
    }
};
