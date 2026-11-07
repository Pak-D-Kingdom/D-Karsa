<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Nomor CP terpisah untuk tiap narahubung (acara formal / instansi).
     * Satu nama satu nomor CP — bukan digabung dalam satu kolom.
     */
    public function up(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            if (! Schema::hasColumn('couples', 'cp_phone_1')) {
                $table->string('cp_phone_1', 30)->nullable()->after('bride_city');
            }
            if (! Schema::hasColumn('couples', 'cp_phone_2')) {
                $table->string('cp_phone_2', 30)->nullable()->after('cp_phone_1');
            }
        });
    }

    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            if (Schema::hasColumn('couples', 'cp_phone_1')) {
                $table->dropColumn('cp_phone_1');
            }
            if (Schema::hasColumn('couples', 'cp_phone_2')) {
                $table->dropColumn('cp_phone_2');
            }
        });
    }
};
