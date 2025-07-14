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
        Schema::table('deliveryindeliveryreport', function (Blueprint $table) {
            $table->foreign(['DeliveryID'], 'deliveryindeliveryreport_ibfk_2')->references(['DeliveryID'])->on('delivery');
            $table->foreign(['GeneralReportID', 'DeliveryReportID'], 'deliveryindeliveryreport_ibfk_1')->references(['GeneralReportID', 'DeliveryReportID'])->on('deliveryreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveryindeliveryreport', function (Blueprint $table) {
            $table->dropForeign('deliveryindeliveryreport_ibfk_2');
            $table->dropForeign('deliveryindeliveryreport_ibfk_1');
        });
    }
};
