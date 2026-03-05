<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel portfolios.
 * Menyimpan data proyek/karya yang pernah dikerjakan.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('description')->nullable();
            $table->string('client')->nullable();         // Nama klien
            $table->string('image')->nullable();          // Gambar utama
            $table->string('thumbnail')->nullable();      // Thumbnail untuk list
            $table->string('category')->nullable();       // Kategori proyek
            $table->json('tech_stack')->nullable();       // Teknologi yang digunakan
            $table->string('url')->nullable();            // URL proyek live
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Index untuk performa query
            $table->index(['is_featured', 'published_at']);
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
