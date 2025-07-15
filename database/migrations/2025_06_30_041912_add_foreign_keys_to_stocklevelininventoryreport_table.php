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
        Schema::table('stocklevelininventoryreport', function (Blueprint $table) {
            $table->foreign(['StockLevelID'], 'stocklevelininventoryreport_ibfk_2')->references(['StockLevelID'])->on('stocklevel');
            $table->foreign(['GeneralReportID', 'InventoryReportID'], 'stocklevelininventoryreport_ibfk_1')->references(['GeneralReportID', 'InventoryReportID'])->on('inventoryreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocklevelininventoryreport', function (Blueprint $table) {
            $table->dropForeign('stocklevelininventoryreport_ibfk_2');
            $table->dropForeign('stocklevelininventoryreport_ibfk_1');
        });
    }
};
