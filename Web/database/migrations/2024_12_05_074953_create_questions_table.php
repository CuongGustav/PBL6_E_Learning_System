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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('Name_question');
            $table->string('Answer_A', 200);
            $table->string('Answer_B', 200);
            $table->string('Answer_C', 200);
            $table->string('Answer_D', 200);
            $table->string('Answer_right', 200);
            $table->unsignedBigInteger('id_test');
            $table->foreign('id_test') -> references('id') -> on('tests') -> onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
