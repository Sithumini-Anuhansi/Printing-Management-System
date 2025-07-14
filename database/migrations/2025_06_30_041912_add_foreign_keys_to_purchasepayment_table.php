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
        Schema::table('purchasepayment', function (Blueprint $table) {
            $table->foreign(['PurchaseID'], 'fk_PurchasePayment_Purchase')->references(['PurchaseID'])->on('purchase');
            $table->foreign(['PurchasePaymentRequestID'], 'fk_PurchasePayment_PaymentRequest')->references(['PurchasePaymentRequestID'])->on('purchasepaymentrequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasepayment', function (Blueprint $table) {
            $table->dropForeign('fk_PurchasePayment_Purchase');
            $table->dropForeign('fk_PurchasePayment_PaymentRequest');
        });
    }
};
