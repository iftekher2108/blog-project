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
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('men_id')->constrained('menus')->onDelete('set null')->onUpdate('set null');
            $table->integer('order_id')->nullable();
            $table->string('sub_title')->unique();
            $table->string('sub_slug')->unique();
            $table->string('sub_picture')->nullable();
            $table->string('sub_content')->nullable();
            $table->enum('status',['publish','unpublish']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('sub_menus', function (Blueprint $table) {
        //     $table->dropForeign('men_id');
        // });
        Schema::dropIfExists('sub_menus');
    }
};
