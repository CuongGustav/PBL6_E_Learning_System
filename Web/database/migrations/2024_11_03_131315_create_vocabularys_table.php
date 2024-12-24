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
        Schema::create('vocabularys', function (Blueprint $table) {
            $table->id();
            $table->string('name_voca', 200);
            $table->string('transcribe_phonetically', 200);
            $table->string('meaning', 200);
            $table->string('example', 200);
            $table->string('image_voca', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabularys');
    }
};
