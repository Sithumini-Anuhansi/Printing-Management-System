<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasematerial', function (Blueprint $table) {
            $table->foreign(['MaterialID'], 'purchasematerial_ibfk_2')->references(['MaterialID'])->on('material');
            $table->foreign(['PurchaseID'], 'purchasematerial_ibfk_1')->references(['PurchaseID'])->on('purchase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasematerial', function (Blueprint $table) {
            $table->dropForeign('purchasematerial_ibfk_2');
            $table->dropForeign('purchasematerial_ibfk_1');
        });
    }
};
