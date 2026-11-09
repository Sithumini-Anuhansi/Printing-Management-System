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
        Schema::create('stocklevelininventoryreport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->nullable();
            $table->integer('InventoryReportID')->nullable();
            $table->integer('StockLevelID')->nullable()->index('StockLevelID');

            $table->index(['GeneralReportID', 'InventoryReportID'], 'GeneralReportID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocklevelininventoryreport');
    }
};
