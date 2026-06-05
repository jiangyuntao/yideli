<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('news', 'sort_order')) {
            return;
        }

        Schema::table('news', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('published_at');
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('news', 'sort_order')) {
            return;
        }

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
