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
        Schema::table('deliveryreport', function (Blueprint $table) {
            $table->foreign(['GeneralReportID'], 'deliveryreport_ibfk_1')->references(['GeneralReportID'])->on('generalreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveryreport', function (Blueprint $table) {
            $table->dropForeign('deliveryreport_ibfk_1');
        });
    }
};
