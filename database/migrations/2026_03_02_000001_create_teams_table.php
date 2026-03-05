<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('initial', 10);
            $table->string('accent')->default('from-blue-500 to-indigo-600');
            $table->text('bio')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('photo')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('is_active');
            $table->index('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
