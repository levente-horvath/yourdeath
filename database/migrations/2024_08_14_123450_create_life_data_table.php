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
        Schema::create('life_data', function (Blueprint $table) {
            $table->id();
            $table->date('birthdate');
            $table->string('nationality');
            $table->string('gender')->nullable();
            $table->integer('lifeexpectancy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_data');
    }
};
