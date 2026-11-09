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
        Schema::create('purchasereport', function (Blueprint $table) {
            $table->integer('GeneralReportID');
            $table->integer('PurchaseReportID');
            $table->date('Date')->nullable();
            $table->integer('PurchasedMaterialQuantity')->nullable();
            $table->decimal('TotalPurchaseBill', 10)->nullable();

            $table->primary(['GeneralReportID', 'PurchaseReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasereport');
    }
};
