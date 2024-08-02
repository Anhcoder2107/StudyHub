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
        Schema::create('livestream', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->string('title');
            $table->text('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('url');
            $table->string('recording_url')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestream');
    }
};
