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
        Schema::table('user_detail', function (Blueprint $table) {
            $table->char('id_village', 10)->nullable();
            $table->foreign('id_village')
                ->references('id')
                ->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_detail', function (Blueprint $table) {
            $table->dropColumn('id_village');
        });
    }
};
