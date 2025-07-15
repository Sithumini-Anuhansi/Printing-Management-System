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
        Schema::create('order', function (Blueprint $table) {
            $table->integer('OrderID')->primary();
            $table->string('OrderType', 20)->nullable();
            $table->date('OrderDate')->nullable();
            $table->string('Products')->nullable();
            $table->integer('ProductQuantity')->nullable();
            $table->string('Description')->nullable();
            $table->date('OrderDueDate')->nullable();
            $table->integer('DesignID')->nullable()->index('fk_Order_Design');
            $table->integer('ProductionID')->nullable()->index('fk_Order_Production');
            $table->integer('CustomerID')->nullable()->index('fk_Order_Customer');
            $table->integer('OrderPaymentID')->nullable()->index('fk_Order_OrderPayment');
            $table->integer('OrderInvoiceID')->nullable()->index('fk_Order_OrderInvoice');
            $table->integer('OrderQuotationID')->nullable()->index('fk_Order_OrderQuotation');
            $table->integer('DeliveryID')->nullable()->index('fk_Order_Delivery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
