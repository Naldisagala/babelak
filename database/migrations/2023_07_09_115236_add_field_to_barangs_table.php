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
        Schema::table('barangs', function (Blueprint $table) {
            $table->integer('stock')->default(0);
            $table->text('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('usage')->nullable();
            $table->string('method')->nullable();
            $table->char('id_village', 10)->nullable();;
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
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('stock');
            $table->dropColumn('address');
            $table->dropColumn('postcode');
            $table->dropColumn('usage');
            $table->dropColumn('method');
            $table->dropColumn('id_village');
        });
    }
};
