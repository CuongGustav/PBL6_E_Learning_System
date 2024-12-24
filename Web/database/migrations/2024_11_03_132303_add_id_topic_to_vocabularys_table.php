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
        Schema::table('vocabularys', function (Blueprint $table) {
            $table->unsignedBigInteger('id_topic');
            $table->foreign('id_topic') -> references('id') -> on('topics') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vocabularys', function (Blueprint $table) {
            //
        });
    }
};
