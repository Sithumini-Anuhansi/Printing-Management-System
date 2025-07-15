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
        Schema::create('salesreport', function (Blueprint $table) {
            $table->integer('GeneralReportID');
            $table->integer('SalesReportID');
            $table->date('Date')->nullable();
            $table->integer('TotalSalesQuantity')->nullable();
            $table->integer('TotalOrderQuantity')->nullable();
            $table->decimal('TotalSalesAmount', 10)->nullable();

            $table->primary(['GeneralReportID', 'SalesReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesreport');
    }
};
