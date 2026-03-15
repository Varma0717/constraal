<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('type')->default('General');
            $table->text('message');
            $table->string('status')->default('New');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
};
