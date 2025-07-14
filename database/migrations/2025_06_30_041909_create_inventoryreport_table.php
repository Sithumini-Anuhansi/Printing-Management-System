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
        Schema::create('inventoryreport', function (Blueprint $table) {
            $table->integer('GeneralReportID');
            $table->integer('InventoryReportID');
            $table->date('Date')->nullable();
            $table->integer('TotalUsedMaterialQuantity')->nullable();
            $table->integer('TotalAvailableMaterialQuantity')->nullable();

            $table->primary(['GeneralReportID', 'InventoryReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventoryreport');
    }
};
