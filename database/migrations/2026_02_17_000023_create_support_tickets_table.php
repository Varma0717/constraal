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
        if (!Schema::hasTable('support_tickets')) {
            Schema::create('support_tickets', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->string('ticket_number')->unique();
                $table->string('subject');
                $table->longText('description');
                $table->string('status')->default('open')->index();
                $table->string('priority')->default('normal')->index();
                $table->foreignId('assigned_to')->nullable()->constrained('admins')->onDelete('set null');
                $table->timestamps();
                $table->index('user_id');
                $table->index('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
