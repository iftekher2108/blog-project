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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('data_name');
            $table->unsignedBigInteger("order_id")->default(0);
            $table->unsignedBigInteger('data_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('link')->nullable();
            $table->longText('content')->nullable();
            $table->string('picture')->nullable();

            $table->string('data_type')->nullable();
            $table->enum('status',['publish','unpublish']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
