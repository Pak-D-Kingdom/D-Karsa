<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('couples', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->default('riko-putri');
            $table->string('groom_name');
            $table->string('groom_fullname');
            $table->string('groom_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->string('groom_photo')->nullable();
            $table->string('bride_name');
            $table->string('bride_fullname');
            $table->string('bride_father')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('bride_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->date('wedding_date')->nullable();
            $table->string('venue_name')->nullable();
            $table->text('quote')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('couples');
    }
};
