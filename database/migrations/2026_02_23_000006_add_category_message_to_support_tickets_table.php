<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('support_tickets', 'category')) {
                $table->string('category')->nullable()->after('description');
            }
            if (!Schema::hasColumn('support_tickets', 'message')) {
                $table->longText('message')->nullable()->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            if (Schema::hasColumn('support_tickets', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('support_tickets', 'message')) {
                $table->dropColumn('message');
            }
        });
    }
};
