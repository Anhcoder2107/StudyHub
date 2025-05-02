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
        Schema::create('examination_submits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examination_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('submit_time');
            $table->integer('score')->nullable();
            $table->string('file_url');
            $table->timestamps();

            $table->foreign('examination_id')->references('id')->on('examinations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examination_submits');
    }
};
