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
            $table->unsignedBigInteger('order_id')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->string('picture')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('short_content');
            $table->string('main_content');

            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_cat_id');

            $table->integer('comment_id')->nullable();
            $table->integer('react_id')->nullable();

            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->OnDelete('cascade');
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories')->OnDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('news', function (Blueprint $table) {
        //     $table->dropForeign('user_id');
        //     $table->dropForeign('cat_id');
        //     $table->dropForeign('sub_cat_id');
        // });
        Schema::dropIfExists('news');
    }
};
