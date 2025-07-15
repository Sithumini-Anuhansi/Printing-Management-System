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
        Schema::table('purchasesinpurchasereport', function (Blueprint $table) {
            $table->foreign(['PurchaseID'], 'purchasesinpurchasereport_ibfk_2')->references(['PurchaseID'])->on('purchase');
            $table->foreign(['GeneralReportID', 'PurchaseReportID'], 'purchasesinpurchasereport_ibfk_1')->references(['GeneralReportID', 'PurchaseReportID'])->on('purchasereport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasesinpurchasereport', function (Blueprint $table) {
            $table->dropForeign('purchasesinpurchasereport_ibfk_2');
            $table->dropForeign('purchasesinpurchasereport_ibfk_1');
        });
    }
};
