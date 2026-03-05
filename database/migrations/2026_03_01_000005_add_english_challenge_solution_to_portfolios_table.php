<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambahkan versi bahasa Inggris untuk challenge dan solution.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->text('challenge_en')->nullable()->after('challenge');
            $table->text('solution_en')->nullable()->after('solution');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['challenge_en', 'solution_en']);
        });
    }
};
