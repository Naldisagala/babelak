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
        Schema::table('alamat', function (Blueprint $table) {
            Schema::rename('alamat', 'alamats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alamat', function (Blueprint $table) {
            Schema::rename('alamat', 'alamats');
        });
    }
};
