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
        Schema::disableForeignKeyConstraints();
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign('barangs_id_village_foreign');
            $table->dropColumn('id_village');
            $table->dropColumn('postcode');
            $table->dropColumn('address');
            $table->integer('wight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('wight');
        });
    }
};
