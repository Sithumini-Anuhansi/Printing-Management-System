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
        Schema::create('paymenthistoryreport', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('PaymentHistoryReportID');
            $table->string('PaymentType', 20)->nullable();
            $table->decimal('PaymentAmount', 10)->nullable();
            $table->integer('TotalPaymentsMade')->nullable();
            $table->decimal('TotalPaymentAmount', 10)->nullable();

            $table->primary(['FinancialReportID', 'PaymentHistoryReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymenthistoryreport');
    }
};
