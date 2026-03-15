<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('homepage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->integer('order')->default(0);
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('homepage_sections');
    }
};
