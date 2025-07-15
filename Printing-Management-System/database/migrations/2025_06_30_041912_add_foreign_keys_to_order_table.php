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
        Schema::table('order', function (Blueprint $table) {
            $table->foreign(['DesignID'], 'fk_Order_Design')->references(['DesignID'])->on('design');
            $table->foreign(['OrderPaymentID'], 'fk_Order_OrderPayment')->references(['OrderPaymentID'])->on('orderpayment');
            $table->foreign(['ProductionID'], 'fk_Order_Production')->references(['ProductionID'])->on('production');
            $table->foreign(['DeliveryID'], 'fk_Order_Delivery')->references(['DeliveryID'])->on('delivery');
            $table->foreign(['OrderInvoiceID'], 'fk_Order_OrderInvoice')->references(['OrderInvoiceID'])->on('orderinvoice');
            $table->foreign(['OrderQuotationID'], 'fk_Order_OrderQuotation')->references(['OrderQuotationID'])->on('orderquotation');
            $table->foreign(['CustomerID'], 'fk_Order_Customer')->references(['CustomerID'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign('fk_Order_Design');
            $table->dropForeign('fk_Order_OrderPayment');
            $table->dropForeign('fk_Order_Production');
            $table->dropForeign('fk_Order_Delivery');
            $table->dropForeign('fk_Order_OrderInvoice');
            $table->dropForeign('fk_Order_OrderQuotation');
            $table->dropForeign('fk_Order_Customer');
        });
    }
};
