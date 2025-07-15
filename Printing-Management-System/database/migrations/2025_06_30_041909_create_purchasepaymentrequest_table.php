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
        Schema::create('purchasepaymentrequest', function (Blueprint $table) {
            $table->integer('PurchasePaymentRequestID')->primary();
            $table->date('Date')->nullable();
            $table->string('Description')->nullable();
            $table->decimal('PaymentAmount', 10)->nullable();
            $table->string('ApprovalStatus', 20)->nullable();
            $table->integer('PurchaseRequestID')->nullable()->index('PurchaseRequestID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasepaymentrequest');
    }
};
