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
        Schema::create('salesinsalesreport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->nullable();
            $table->integer('SalesReportID')->nullable();
            $table->integer('SalesID')->nullable()->index('SalesID');

            $table->index(['GeneralReportID', 'SalesReportID'], 'GeneralReportID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesinsalesreport');
    }
};
