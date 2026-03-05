<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambah kolom versi English pada tabel content.
 * Memungkinkan dukungan multi-bahasa untuk Blog, Portfolio, dan Services.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Add English columns to blogs table
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('excerpt_en')->nullable()->after('excerpt');
            $table->longText('content_en')->nullable()->after('content');
            $table->string('meta_title_en')->nullable()->after('meta_title');
            $table->text('meta_description_en')->nullable()->after('meta_description');
        });

        // Add English columns to services table
        Schema::table('services', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('excerpt_en')->nullable()->after('excerpt');
            $table->longText('description_en')->nullable()->after('description');
        });

        // Add English columns to portfolios table
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('excerpt_en')->nullable()->after('excerpt');
            $table->longText('description_en')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'excerpt_en', 'content_en', 'meta_title_en', 'meta_description_en']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'excerpt_en', 'description_en']);
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'excerpt_en', 'description_en']);
        });
    }
};
