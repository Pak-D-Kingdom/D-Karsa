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
            if (! Schema::hasColumn('couples', 'custom_design')) {
                $table->json('custom_design')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            if (Schema::hasColumn('couples', 'custom_design')) {
                $table->dropColumn('custom_design');
            }
        });
    }
};
