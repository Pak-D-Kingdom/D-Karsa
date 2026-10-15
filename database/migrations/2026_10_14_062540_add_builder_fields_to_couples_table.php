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
            $table->string('category')->default('Pernikahan')->after('slug');
            $table->string('event_heading')->nullable()->after('category');
            $table->string('groom_birth_order')->nullable()->after('groom_fullname');
            $table->string('bride_birth_order')->nullable()->after('bride_fullname');
            $table->string('display_order')->default('groom_first')->after('bride_photo');
            $table->string('groom_city')->nullable()->after('groom_mother');
            $table->string('bride_city')->nullable()->after('bride_mother');
            $table->string('bank_name_1')->nullable()->after('quote');
            $table->string('bank_account_1')->nullable()->after('bank_name_1');
            $table->string('bank_holder_1')->nullable()->after('bank_account_1');
            $table->string('bank_name_2')->nullable()->after('bank_holder_1');
            $table->string('bank_account_2')->nullable()->after('bank_name_2');
            $table->string('bank_holder_2')->nullable()->after('bank_account_2');
            $table->text('gift_address')->nullable()->after('bank_holder_2');
            $table->string('music_url')->nullable()->after('gift_address');
            $table->text('thank_you_note')->nullable()->after('music_url');
            $table->text('story')->nullable()->after('thank_you_note');
            $table->string('status')->default('published')->after('story');
            $table->boolean('is_in_catalog')->default(false)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            $table->dropColumn([
                'category', 'event_heading', 'groom_birth_order', 'bride_birth_order',
                'display_order', 'groom_city', 'bride_city',
                'bank_name_1', 'bank_account_1', 'bank_holder_1',
                'bank_name_2', 'bank_account_2', 'bank_holder_2',
                'gift_address', 'music_url', 'thank_you_note', 'story',
                'status', 'is_in_catalog',
            ]);
        });
    }
};
