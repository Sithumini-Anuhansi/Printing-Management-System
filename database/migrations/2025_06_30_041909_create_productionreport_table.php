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
        Schema::create('productionreport', function (Blueprint $table) {
            $table->integer('GeneralReportID');
            $table->integer('ProductionReportID');
            $table->date('Date')->nullable();
            $table->integer('TotalProductionQuantity')->nullable();
            $table->integer('TotalOrderQuantity')->nullable();

            $table->primary(['GeneralReportID', 'ProductionReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productionreport');
    }
};
