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
        Schema::table('purchase', function (Blueprint $table) {
            $table->foreign(['SupplierID'], 'fk_Purchase_Supplier')->references(['SupplierID'])->on('supplier');
            $table->foreign(['PurchaseRequestID'], 'fk_Purchase_PurchaseRequest')->references(['PurchaseRequestID'])->on('purchaserequest');
            $table->foreign(['PurchasePaymentID'], 'fk_Purchase_PurchasePayment')->references(['PurchasePaymentID'])->on('purchasepayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase', function (Blueprint $table) {
            $table->dropForeign('fk_Purchase_Supplier');
            $table->dropForeign('fk_Purchase_PurchaseRequest');
            $table->dropForeign('fk_Purchase_PurchasePayment');
        });
    }
};
