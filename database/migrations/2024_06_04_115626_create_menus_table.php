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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('picture')->nullable();
            // $table->integer('parent_id')->default(0);
            $table->integer('view')->default(0);
            $table->longText('content')->nullable();
            // $table->unsignedBigInteger('page_id');
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->enum('status',['publish','unpublish']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
