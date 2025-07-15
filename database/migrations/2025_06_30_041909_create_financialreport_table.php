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
        Schema::create('financialreport', function (Blueprint $table) {
            $table->integer('FinancialReportID')->primary();
            $table->string('FinancialReportType', 20)->nullable();
            $table->string('Author', 50)->nullable();
            $table->string('Description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financialreport');
    }
};
