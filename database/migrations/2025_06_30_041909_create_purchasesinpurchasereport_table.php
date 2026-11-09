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
        Schema::create('purchasesinpurchasereport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->nullable();
            $table->integer('PurchaseReportID')->nullable();
            $table->integer('PurchaseID')->nullable()->index('PurchaseID');

            $table->index(['GeneralReportID', 'PurchaseReportID'], 'GeneralReportID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasesinpurchasereport');
    }
};
