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
        Schema::create('productioninproductionreport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->nullable();
            $table->integer('ProductionReportID')->nullable();
            $table->integer('ProductionID')->nullable()->index('ProductionID');

            $table->index(['GeneralReportID', 'ProductionReportID'], 'GeneralReportID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productioninproductionreport');
    }
};
