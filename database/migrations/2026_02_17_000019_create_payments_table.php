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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('subscription_id')->nullable()->constrained('subscriptions')->onDelete('set null');
                $table->decimal('amount', 12, 2);
                $table->string('currency')->default('USD');
                $table->string('status')->default('pending')->index();
                $table->string('payment_method')->nullable();
                $table->string('transaction_id')->unique()->nullable();
                $table->longText('error_message')->nullable();
                $table->timestamp('processed_at')->nullable();
                $table->timestamps();
                $table->index('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
