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
        Schema::create('purchasepayment', function (Blueprint $table) {
            $table->integer('PurchasePaymentID')->primary();
            $table->date('Date')->nullable();
            $table->string('Description')->nullable();
            $table->decimal('PaymentAmount', 10)->nullable();
            $table->string('PaymentMethod', 20)->nullable();
            $table->string('PaymentStatus', 20)->nullable();
            $table->integer('PurchaseID')->nullable()->index('fk_PurchasePayment_Purchase');
            $table->integer('PurchasePaymentRequestID')->nullable()->index('fk_PurchasePayment_PaymentRequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasepayment');
    }
};
