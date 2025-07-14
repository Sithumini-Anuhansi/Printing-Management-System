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
        Schema::table('salesinsalesreport', function (Blueprint $table) {
            $table->foreign(['SalesID'], 'salesinsalesreport_ibfk_2')->references(['SalesID'])->on('sales');
            $table->foreign(['GeneralReportID', 'SalesReportID'], 'salesinsalesreport_ibfk_1')->references(['GeneralReportID', 'SalesReportID'])->on('salesreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salesinsalesreport', function (Blueprint $table) {
            $table->dropForeign('salesinsalesreport_ibfk_2');
            $table->dropForeign('salesinsalesreport_ibfk_1');
        });
    }
};
