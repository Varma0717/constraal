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
        Schema::table('subscribers', function (Blueprint $table) {
            $table->string('interest_category')->default('general')->after('source')->index();
            $table->boolean('investor_interest')->default(false)->after('interest_category');
            $table->boolean('industrial_partner')->default(false)->after('investor_interest');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn(['interest_category', 'investor_interest', 'industrial_partner']);
        });
    }
};
