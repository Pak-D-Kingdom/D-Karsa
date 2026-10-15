<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('couple_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique(); // untuk link undangan ?to=slug
            $table->string('phone')->nullable();
            $table->string('category')->default('Umum'); // Keluarga, Teman, Rekan Kerja
            $table->string('address')->nullable();
            $table->integer('quota')->default(1); // jumlah orang yang diundang
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
