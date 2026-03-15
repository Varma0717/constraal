<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // First: rename column
        if (Schema::hasColumn('payment_methods', 'payment_type') && !Schema::hasColumn('payment_methods', 'type')) {
            Schema::table('payment_methods', function (Blueprint $table) {
                $table->renameColumn('payment_type', 'type');
            });
        }

        // Second: add new columns (using separate call after rename is committed)
        Schema::table('payment_methods', function (Blueprint $table) {
            $afterCol = Schema::hasColumn('payment_methods', 'type') ? 'type' : 'payment_type';
            if (!Schema::hasColumn('payment_methods', 'card_last_four')) {
                $table->string('card_last_four', 4)->nullable()->after($afterCol);
            }
            if (!Schema::hasColumn('payment_methods', 'card_holder')) {
                $table->string('card_holder')->nullable()->after('card_last_four');
            }
            if (!Schema::hasColumn('payment_methods', 'expiry')) {
                $table->string('expiry', 7)->nullable()->after('card_holder');
            }
        });

        // Third: make token nullable
        if (Schema::hasColumn('payment_methods', 'token')) {
            Schema::table('payment_methods', function (Blueprint $table) {
                $table->string('token')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            if (Schema::hasColumn('payment_methods', 'card_last_four')) {
                $table->dropColumn('card_last_four');
            }
            if (Schema::hasColumn('payment_methods', 'card_holder')) {
                $table->dropColumn('card_holder');
            }
            if (Schema::hasColumn('payment_methods', 'expiry')) {
                $table->dropColumn('expiry');
            }
            if (Schema::hasColumn('payment_methods', 'type') && !Schema::hasColumn('payment_methods', 'payment_type')) {
                $table->renameColumn('type', 'payment_type');
            }
        });
    }
};
