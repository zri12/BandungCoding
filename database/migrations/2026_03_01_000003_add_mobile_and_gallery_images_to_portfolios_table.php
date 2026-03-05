<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambahkan kolom mobile image dan gallery images ke tabel portfolios.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('mobile_image')->nullable()->after('image');
            $table->string('gallery_image_1')->nullable()->after('mobile_image');
            $table->string('gallery_image_2')->nullable()->after('gallery_image_1');
            $table->string('gallery_image_3')->nullable()->after('gallery_image_2');
            $table->string('gallery_image_4')->nullable()->after('gallery_image_3');
            $table->string('gallery_image_5')->nullable()->after('gallery_image_4');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'mobile_image',
                'gallery_image_1',
                'gallery_image_2',
                'gallery_image_3',
                'gallery_image_4',
                'gallery_image_5',
            ]);
        });
    }
};
