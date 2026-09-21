<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('expenses', 'deduct_from')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->string('deduct_from')->default('income');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('expenses', 'deduct_from')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->dropColumn('deduct_from');
            });
        }
    }
};