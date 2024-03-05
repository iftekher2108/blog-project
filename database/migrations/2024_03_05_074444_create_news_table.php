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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('feature_img')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('short_content');
            $table->string('main_content');
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('comment')->nullable();
            $table->string('like')->nullable();
            $table->string('dislikes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
