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
        Schema::table('employeesalary', function (Blueprint $table) {
            $table->foreign(['FinancialReportID', 'SalaryReportID'], 'fk_ES_SalaryReport')->references(['FinancialReportID', 'SalaryReportID'])->on('salaryreport');
            $table->foreign(['EmployeeID'], 'fk_ES_Employee')->references(['EmployeeID'])->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employeesalary', function (Blueprint $table) {
            $table->dropForeign('fk_ES_SalaryReport');
            $table->dropForeign('fk_ES_Employee');
        });
    }
};
