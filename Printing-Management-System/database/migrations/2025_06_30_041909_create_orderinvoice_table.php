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
        Schema::create('orderinvoice', function (Blueprint $table) {
            $table->integer('OrderInvoiceID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('Subtotal', 10)->nullable();
            $table->decimal('TaxAmount', 10)->nullable();
            $table->decimal('TotalBillAmount', 10)->nullable();
            $table->string('Status', 20)->nullable();
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
        Schema::dropIfExists('orderinvoice');
    }
};
