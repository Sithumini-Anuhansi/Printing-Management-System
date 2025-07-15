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
        Schema::create('employeesalary', function (Blueprint $table) {
            $table->integer('SalaryReportID');
            $table->integer('EmployeeID')->index('fk_ES_Employee');
            $table->integer('FinancialReportID');

            $table->index(['FinancialReportID', 'SalaryReportID'], 'fk_ES_SalaryReport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeesalary');
    }
};
