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
        Schema::create('materialusageininventoryreport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->nullable();
            $table->integer('InventoryReportID')->nullable();
            $table->integer('MaterialUsageID')->nullable()->index('MaterialUsageID');

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
        Schema::dropIfExists('materialusageininventoryreport');
    }
};
