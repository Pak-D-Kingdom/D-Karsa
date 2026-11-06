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
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'dresscode')) {
                $table->string('dresscode', 200)->nullable()->after('maps_embed');
            }
            if (! Schema::hasColumn('events', 'dresscode_colors')) {
                $table->string('dresscode_colors', 255)->nullable()->after('dresscode');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'dresscode_colors')) {
                $table->dropColumn('dresscode_colors');
            }
            if (Schema::hasColumn('events', 'dresscode')) {
                $table->dropColumn('dresscode');
            }
        });
    }
};
