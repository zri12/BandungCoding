<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambahkan kolom challenge, solution, dan result_metrics ke tabel portfolios.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->text('challenge')->nullable()->after('description_en');
            $table->text('solution')->nullable()->after('challenge');
            $table->json('result_metrics')->nullable()->after('solution');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['challenge', 'solution', 'result_metrics']);
        });
    }
};
