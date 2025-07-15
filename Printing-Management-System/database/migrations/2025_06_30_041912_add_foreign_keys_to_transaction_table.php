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
        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign(['TransactionReceiptID'], 'fk_Transaction_Receipt')->references(['TransactionReceiptID'])->on('transactionreceipt');
            $table->foreign(['TransactionPaymentID'], 'fk_Transaction_Payment')->references(['TransactionPaymentID'])->on('transactionpayment');
            $table->foreign(['TransactionInvoiceID'], 'fk_Transaction_Invoice')->references(['TransactionInvoiceID'])->on('transactioninvoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropForeign('fk_Transaction_Receipt');
            $table->dropForeign('fk_Transaction_Payment');
            $table->dropForeign('fk_Transaction_Invoice');
        });
    }
};
