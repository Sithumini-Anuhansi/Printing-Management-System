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
        Schema::table('monthlyincomestatement', function (Blueprint $table) {
            $table->foreign(['FinancialReportID'], 'fk_MIS_FinancialReport')->references(['FinancialReportID'])->on('financialreport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthlyincomestatement', function (Blueprint $table) {
            $table->dropForeign('fk_MIS_FinancialReport');
        });
    }
};
