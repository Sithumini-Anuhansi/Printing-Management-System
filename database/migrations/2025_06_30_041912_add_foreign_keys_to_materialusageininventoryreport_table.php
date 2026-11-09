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
        Schema::table('materialusageininventoryreport', function (Blueprint $table) {
            $table->foreign(['MaterialUsageID'], 'materialusageininventoryreport_ibfk_2')->references(['MaterialUsageID'])->on('materialusage');
            $table->foreign(['GeneralReportID', 'InventoryReportID'], 'materialusageininventoryreport_ibfk_1')->references(['GeneralReportID', 'InventoryReportID'])->on('inventoryreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materialusageininventoryreport', function (Blueprint $table) {
            $table->dropForeign('materialusageininventoryreport_ibfk_2');
            $table->dropForeign('materialusageininventoryreport_ibfk_1');
        });
    }
};
