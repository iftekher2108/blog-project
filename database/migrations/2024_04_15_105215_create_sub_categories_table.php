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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->default(0);
            $table->string('sub_title')->unique();
            $table->string('sub_slug')->unique();
            $table->unsignedBigInteger('cat_id');
            $table->string('sub_picture');
            $table->string('sub_content');
            $table->enum('status',['publish','unpublish']);
            $table->timestamps();

            // $table->foreign('sub_cat_id')->references('id')->on('categories')->OnDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('sub_categories', function (Blueprint $table) {
        //     $table->dropForeign('cat_id');
        // });
        Schema::dropIfExists('sub_categories');
    }
};
