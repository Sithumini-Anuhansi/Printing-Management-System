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
        Schema::create('transactionpayment', function (Blueprint $table) {
            $table->integer('TransactionPaymentID')->primary();
            $table->string('PaymentMethod', 20)->nullable();
            $table->date('Date')->nullable();
            $table->string('PaymentStatus', 20)->nullable();
            $table->decimal('PaymentAmount', 10)->nullable();
            $table->integer('TransactionID')->nullable()->index('fk_TP_Transaction');
            $table->integer('PaymentRequestID')->nullable()->index('fk_TP_PaymentRequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactionpayment');
    }
};
