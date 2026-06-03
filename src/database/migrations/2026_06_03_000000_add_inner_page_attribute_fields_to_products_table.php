<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'inner_page_color')) {
                $table->json('inner_page_color')->nullable()->after('inner_pages');
            }

            if (! Schema::hasColumn('products', 'inner_page_paper_weight')) {
                $table->json('inner_page_paper_weight')->nullable()->after('inner_page_color');
            }

            if (! Schema::hasColumn('products', 'inner_page_sheet_count')) {
                $table->json('inner_page_sheet_count')->nullable()->after('inner_page_paper_weight');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $dropColumns = array_values(array_filter([
                Schema::hasColumn('products', 'inner_page_color') ? 'inner_page_color' : null,
                Schema::hasColumn('products', 'inner_page_paper_weight') ? 'inner_page_paper_weight' : null,
                Schema::hasColumn('products', 'inner_page_sheet_count') ? 'inner_page_sheet_count' : null,
            ]));

            if ($dropColumns !== []) {
                $table->dropColumn($dropColumns);
            }
        });
    }
};
