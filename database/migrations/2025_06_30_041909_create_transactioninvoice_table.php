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
        Schema::create('transactioninvoice', function (Blueprint $table) {
            $table->integer('TransactionInvoiceID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('Subtotal', 10)->nullable();
            $table->decimal('TaxAmount', 10)->nullable();
            $table->decimal('TotalAmount', 10)->nullable();
            $table->integer('TransactionID')->nullable()->index('fk_TI_Transaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactioninvoice');
    }
};
