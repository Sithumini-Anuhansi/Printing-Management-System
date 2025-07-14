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
        Schema::create('transactionreceipt', function (Blueprint $table) {
            $table->integer('TransactionReceiptID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('Amount', 10)->nullable();
            $table->integer('TransactionID')->nullable()->index('fk_TR_Transaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactionreceipt');
    }
};
