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
        Schema::create('outstandingpaymentsreport', function (Blueprint $table) {
            $table->integer('FinancialReportID');
            $table->integer('OutstandingPaymentsReportID');
            $table->string('PaymentType', 20)->nullable();
            $table->decimal('PaymentAmount', 10)->nullable();
            $table->integer('TotalOutstandingPayments')->nullable();
            $table->decimal('TotalOutstandingPaymentAmount', 10)->nullable();

            $table->primary(['FinancialReportID', 'OutstandingPaymentsReportID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outstandingpaymentsreport');
    }
};
