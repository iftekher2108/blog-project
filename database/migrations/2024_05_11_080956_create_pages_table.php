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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('route');
            $table->string('sub_title')->nullable();
            $table->string('picture')->nullable();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('keywords')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
