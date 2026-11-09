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
        Schema::create('deliveryreport', function (Blueprint $table) {
            $table->integer('GeneralReportID');
            $table->integer('DeliveryReportID');
            $table->date('Date')->nullable();
            $table->integer('DeliveredOrderQuantity')->nullable();

            $table->primary(['GeneralReportID', 'DeliveryReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveryreport');
    }
};
