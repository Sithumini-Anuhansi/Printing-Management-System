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
        Schema::create('orderquotation', function (Blueprint $table) {
            $table->integer('OrderQuotationID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('EstimatedBillAmount', 10)->nullable();
            $table->date('EstimatedDeliveryDate')->nullable();
            $table->string('ApprovalStatus', 20)->nullable();
            $table->string('Description')->nullable();
            $table->integer('CustomerID')->nullable()->index('CustomerID');
            $table->integer('OrderID')->nullable()->index('OrderID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderquotation');
    }
};
