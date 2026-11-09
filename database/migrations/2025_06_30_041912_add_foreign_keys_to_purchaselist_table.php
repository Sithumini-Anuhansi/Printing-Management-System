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
        Schema::table('purchaselist', function (Blueprint $table) {
            $table->foreign(['MaterialID'], 'purchaselist_ibfk_1')->references(['MaterialID'])->on('material');
            $table->foreign(['PurchaseRequestID'], 'fk_PurchaseList_PurchaseRequest')->references(['PurchaseRequestID'])->on('purchaserequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchaselist', function (Blueprint $table) {
            $table->dropForeign('purchaselist_ibfk_1');
            $table->dropForeign('fk_PurchaseList_PurchaseRequest');
        });
    }
};
