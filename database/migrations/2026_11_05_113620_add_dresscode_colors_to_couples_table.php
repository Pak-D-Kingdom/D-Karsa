<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            if (! Schema::hasColumn('couples', 'dresscode_colors')) {
                $table->string('dresscode_colors', 255)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            if (Schema::hasColumn('couples', 'dresscode_colors')) {
                $table->dropColumn('dresscode_colors');
            }
        });
    }
};
