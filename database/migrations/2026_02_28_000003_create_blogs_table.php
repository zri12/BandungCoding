<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel blogs.
 * Menyimpan artikel blog perusahaan dengan SEO fields.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->json('tags')->nullable();              // Tags dalam format JSON
            $table->string('meta_title')->nullable();      // SEO title override
            $table->text('meta_description')->nullable();  // SEO description override
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Index untuk performa query
            $table->index(['is_published', 'published_at']);
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
