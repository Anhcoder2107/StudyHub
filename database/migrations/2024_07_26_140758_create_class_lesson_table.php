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
        Schema::create('class_lesson', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('video_id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('video')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_lesson');
    }
};
