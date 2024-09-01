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
            $table->unsignedBigInteger('user_id');
            $table->string('picture')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->longText('content');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->integer('react_id')->nullable()->default(0);
            $table->integer('views')->default(0);
            $table->enum('status',['publish','unpublish']);
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
