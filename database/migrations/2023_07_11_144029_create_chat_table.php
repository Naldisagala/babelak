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
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from')->index()->nullable();
            $table->foreign('from')->references('id')->on('users');
            $table->unsignedBigInteger('to')->index()->nullable();
            $table->foreign('to')->references('id')->on('users');
            $table->unsignedBigInteger('id_tawar')->index()->nullable();
            $table->foreign('id_tawar')->references('id')->on('tawars');
            $table->string('message')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
