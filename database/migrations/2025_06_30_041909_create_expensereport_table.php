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
        Schema::create('expensereport', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('ExpenseReportID');
            $table->string('ExpenseType', 20)->nullable();
            $table->decimal('ExpenseAmount', 10)->nullable();
            $table->decimal('TotalExpenses', 10)->nullable();

            $table->primary(['FinancialReportID', 'ExpenseReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expensereport');
    }
};
