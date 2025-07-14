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
        Schema::table('salaryreport', function (Blueprint $table) {
            $table->foreign(['FinancialReportID'], 'fk_SR_FinancialReport')->references(['FinancialReportID'])->on('financialreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salaryreport', function (Blueprint $table) {
            $table->dropForeign('fk_SR_FinancialReport');
        });
    }
};
