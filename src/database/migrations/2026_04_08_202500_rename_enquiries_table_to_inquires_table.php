<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('enquiries') && !Schema::hasTable('inquires')) {
            Schema::rename('enquiries', 'inquires');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('inquires') && !Schema::hasTable('enquiries')) {
            Schema::rename('inquires', 'enquiries');
        }
    }
};

