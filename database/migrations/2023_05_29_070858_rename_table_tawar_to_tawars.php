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
        Schema::table('tawar', function (Blueprint $table) {
           Schema::rename('tawar', 'tawars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tawar', function (Blueprint $table) {
           Schema::rename('tawar', 'tawars');
        });
    }
};
