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
        Schema::create('transaction', function (Blueprint $table) {
            $table->integer('TransactionID')->primary();
            $table->string('TransactionType', 20)->nullable();
            $table->date('Date')->nullable();
            $table->string('Person', 50)->nullable();
            $table->decimal('Amount', 10)->nullable();
            $table->string('Description')->nullable();
            $table->string('Status', 20)->nullable();
            $table->integer('TransactionInvoiceID')->nullable()->index('fk_Transaction_Invoice');
            $table->integer('TransactionPaymentID')->nullable()->index('fk_Transaction_Payment');
            $table->integer('TransactionReceiptID')->nullable()->index('fk_Transaction_Receipt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};
