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
        Schema::create('orderpayment', function (Blueprint $table) {
            $table->integer('OrderPaymentID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('TotalBill', 10)->nullable();
            $table->string('PaymentMethod', 20)->nullable();
            $table->string('PaymentStatus', 20)->nullable();
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
        Schema::dropIfExists('orderpayment');
    }
};
