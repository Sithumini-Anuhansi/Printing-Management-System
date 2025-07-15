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
        Schema::create('profitandlossstatement', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('ProfitAndLossStatementID');
            $table->decimal('Income', 10)->nullable();
            $table->decimal('Expense', 10)->nullable();
            $table->decimal('NetProfit', 10)->nullable();
            $table->decimal('NetLoss', 10)->nullable();

            $table->primary(['FinancialReportID', 'ProfitAndLossStatementID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profitandlossstatement');
    }
};
