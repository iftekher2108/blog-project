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
            $table->string('data_name')->unique();
            $table->string('nav_items')->nullable();
            $table->string('slider')->nullable();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('picture')->nullable();
            $table->string('data_type')->nullable();
            $table->string('status');
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
