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
        Schema::create('monthlyincomestatement', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('MonthlyIncomeStatementID');
            $table->string('IncomeType', 20)->nullable();
            $table->decimal('IncomeAmount', 10)->nullable();
            $table->decimal('NetIncome', 10)->nullable();
            $table->string('Month', 10)->nullable();

            $table->primary(['FinancialReportID', 'MonthlyIncomeStatementID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthlyincomestatement');
    }
};
