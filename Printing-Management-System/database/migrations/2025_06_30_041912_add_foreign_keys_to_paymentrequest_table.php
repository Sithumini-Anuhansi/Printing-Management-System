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
        Schema::table('paymentrequest', function (Blueprint $table) {
            $table->foreign(['TransactionPaymentID'], 'fk_PR_TransactionPayment')->references(['TransactionPaymentID'])->on('transactionpayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paymentrequest', function (Blueprint $table) {
            $table->dropForeign('fk_PR_TransactionPayment');
        });
    }
};
