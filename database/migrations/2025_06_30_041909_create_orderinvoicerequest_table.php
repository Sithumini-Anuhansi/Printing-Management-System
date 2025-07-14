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
        Schema::create('orderinvoicerequest', function (Blueprint $table) {
            $table->integer('OrderInvoiceRequestID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('TotalBillAmount', 10)->nullable();
            $table->string('RequestStatus', 20)->nullable();
            $table->string('Remarks', 50)->nullable();
            $table->integer('OrderInvoiceID')->nullable()->index('OrderInvoiceID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderinvoicerequest');
    }
};
