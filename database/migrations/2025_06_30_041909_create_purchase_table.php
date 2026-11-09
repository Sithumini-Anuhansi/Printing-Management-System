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
        Schema::create('purchase', function (Blueprint $table) {
            $table->integer('PurchaseID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('TotalBill', 10)->nullable();
            $table->string('Description')->nullable();
            $table->integer('PurchaseRequestID')->nullable()->index('fk_Purchase_PurchaseRequest');
            $table->integer('SupplierID')->nullable()->index('fk_Purchase_Supplier');
            $table->integer('PurchasePaymentID')->nullable()->index('fk_Purchase_PurchasePayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
};
