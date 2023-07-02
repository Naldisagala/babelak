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
        Schema::create('tawar', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_seller');
            $table->string('id_barang');
            $table->integer('harga_tawar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tawar');
    }
};
