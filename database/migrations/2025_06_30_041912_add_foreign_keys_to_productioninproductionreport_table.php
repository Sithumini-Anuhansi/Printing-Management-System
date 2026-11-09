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
        Schema::table('productioninproductionreport', function (Blueprint $table) {
            $table->foreign(['ProductionID'], 'productioninproductionreport_ibfk_2')->references(['ProductionID'])->on('production');
            $table->foreign(['GeneralReportID', 'ProductionReportID'], 'productioninproductionreport_ibfk_1')->references(['GeneralReportID', 'ProductionReportID'])->on('productionreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productioninproductionreport', function (Blueprint $table) {
            $table->dropForeign('productioninproductionreport_ibfk_2');
            $table->dropForeign('productioninproductionreport_ibfk_1');
        });
    }
};
