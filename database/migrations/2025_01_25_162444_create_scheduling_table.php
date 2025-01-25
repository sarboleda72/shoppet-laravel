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
        Schema::create('scheduling', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('description');
            $table->date('appoitment');
            $table->string('branch');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduling');
    }
};
