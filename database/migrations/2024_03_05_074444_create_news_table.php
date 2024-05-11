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
            $table->unsignedBigInteger('order_id')->nullable();
            // $table->foreign('user_id')->constrained('users')->onDelete('cascade');
            $table->string('picture')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('short_content');
            $table->string('main_content');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->constrained('categories')->onDelete('set null')->onUpdate('set null');
            $table->unsignedBigInteger('sub_cat_id');
            $table->foreign('sub_cat_id')->constrained('sub_categories')->onDelete('set null')->onUpdate('set null');
            $table->integer('comment_id')->nullable();
            $table->integer('react_id')->nullable();
            $table->timestamps();
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
