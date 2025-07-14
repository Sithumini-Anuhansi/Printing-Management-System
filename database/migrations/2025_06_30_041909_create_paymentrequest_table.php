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
        Schema::create('paymentrequest', function (Blueprint $table) {
            $table->integer('PaymentRequestID')->primary();
            $table->date('Date')->nullable();
            $table->string('Description')->nullable();
            $table->string('ApprovalStatus', 20)->nullable();
            $table->string('Remarks', 50)->nullable();
            $table->integer('TransactionPaymentID')->nullable()->index('fk_PR_TransactionPayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentrequest');
    }
};
