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
        Schema::table('transactionpayment', function (Blueprint $table) {
            $table->foreign(['TransactionID'], 'fk_TP_Transaction')->references(['TransactionID'])->on('transaction');
            $table->foreign(['PaymentRequestID'], 'fk_TP_PaymentRequest')->references(['PaymentRequestID'])->on('paymentrequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactionpayment', function (Blueprint $table) {
            $table->dropForeign('fk_TP_Transaction');
            $table->dropForeign('fk_TP_PaymentRequest');
        });
    }
};
