<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('savings', 'saving_date')) {
            Schema::table('savings', function (Blueprint $table) {
                $table->date('saving_date')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('savings', 'saving_date')) {
            Schema::table('savings', function (Blueprint $table) {
                $table->dropColumn('saving_date');
            });
        }
    }
};