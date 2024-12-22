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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_title');
            $table->string('title');
            $table->string('title_1')->nullable();
            $table->string('description');
            $table->string('layout');
            $table->string('picture');
            $table->string('picture_1')->nullable();
            $table->string('picture_2')->nullable();
            $table->string('picture_3')->nullable();
            $table->string('picture_4')->nullable();
            $table->string('content')->nullable();
            $table->string('content_1')->nullable();
            $table->string('link')->nullable();
            $table->string('link_1')->nullable();
            $table->boolean('is_homepage')->default(false);
            $table->enum('status',['publish','unpublish']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
