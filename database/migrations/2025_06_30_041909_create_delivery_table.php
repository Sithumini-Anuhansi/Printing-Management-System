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
        Schema::create('delivery', function (Blueprint $table) {
            $table->integer('DeliveryID')->primary();
            $table->date('Date')->nullable();
            $table->string('Description')->nullable();
            $table->decimal('OrderWeight', 10)->nullable();
            $table->decimal('DeliveryCharge', 10)->nullable();
            $table->bigInteger('PhoneNumber')->nullable();
            $table->string('Address')->nullable();
            $table->string('DeliveryStatus', 20)->nullable();
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
        Schema::dropIfExists('delivery');
    }
};
