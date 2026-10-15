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
        Schema::table('wishes', function (Blueprint $table) {
            $table->foreignId('couple_id')->nullable()->after('id')->constrained('couples')->nullOnDelete();
        });

        // Assign existing seeded wishes to first couple (demo couple)
        $firstCouple = \App\Models\Couple::first();
        if ($firstCouple) {
            \App\Models\Wish::whereNull('couple_id')->update(['couple_id' => $firstCouple->id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wishes', function (Blueprint $table) {
            $table->dropForeign(['couple_id']);
            $table->dropColumn('couple_id');
        });
    }
};
