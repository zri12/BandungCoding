<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel services.
 * Menyimpan data layanan yang ditawarkan perusahaan.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('description')->nullable();
            $table->string('icon')->nullable();          // Icon class atau SVG path
            $table->string('image')->nullable();          // Path gambar
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);    // Urutan tampil
            $table->timestamps();

            // Index untuk performa query
            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
