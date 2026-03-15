<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone', 20)->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'profile_picture')) {
                $table->string('profile_picture')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'two_factor_enabled')) {
                $table->boolean('two_factor_enabled')->default(false)->after('profile_picture');
            }
            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('two_factor_enabled');
            }
            if (!Schema::hasColumn('users', 'notify_billing')) {
                $table->boolean('notify_billing')->default(true)->after('is_active');
            }
            if (!Schema::hasColumn('users', 'notify_security')) {
                $table->boolean('notify_security')->default(true)->after('notify_billing');
            }
            if (!Schema::hasColumn('users', 'notify_updates')) {
                $table->boolean('notify_updates')->default(true)->after('notify_security');
            }
            if (!Schema::hasColumn('users', 'notify_marketing')) {
                $table->boolean('notify_marketing')->default(false)->after('notify_updates');
            }
            if (!Schema::hasColumn('users', 'notify_email')) {
                $table->boolean('notify_email')->default(true)->after('notify_marketing');
            }
            if (!Schema::hasColumn('users', 'notify_sms')) {
                $table->boolean('notify_sms')->default(false)->after('notify_email');
            }
            if (!Schema::hasColumn('users', 'theme')) {
                $table->string('theme', 10)->default('light')->after('notify_sms');
            }
            if (!Schema::hasColumn('users', 'language')) {
                $table->string('language', 5)->default('en')->after('theme');
            }
            if (!Schema::hasColumn('users', 'allow_data_collection')) {
                $table->boolean('allow_data_collection')->default(true)->after('language');
            }
            if (!Schema::hasColumn('users', 'allow_analytics')) {
                $table->boolean('allow_analytics')->default(true)->after('allow_data_collection');
            }
            if (!Schema::hasColumn('users', 'allow_marketing')) {
                $table->boolean('allow_marketing')->default(false)->after('allow_analytics');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'phone',
                'profile_picture',
                'two_factor_enabled',
                'is_active',
                'notify_billing',
                'notify_security',
                'notify_updates',
                'notify_marketing',
                'notify_email',
                'notify_sms',
                'theme',
                'language',
                'allow_data_collection',
                'allow_analytics',
                'allow_marketing',
            ];
            foreach ($columns as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
