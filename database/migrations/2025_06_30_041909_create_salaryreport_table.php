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
        Schema::create('salaryreport', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('SalaryReportID');
            $table->decimal('TotalSalaryPayment', 10)->nullable();

            $table->primary(['FinancialReportID', 'SalaryReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaryreport');
    }
};
