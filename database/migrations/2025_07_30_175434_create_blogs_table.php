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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blogTitle');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->text('introductionText');
            $table->string('mainImage')->nullable();
            $table->longText('mainContent');
            $table->string('serves')->nullable();
            $table->integer('prepTime')->nullable();
            $table->integer('cookTime')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('directions')->nullable();
            $table->string('blogTags')->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
