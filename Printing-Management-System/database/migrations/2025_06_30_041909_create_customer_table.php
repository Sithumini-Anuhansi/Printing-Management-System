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
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('CustomerID')->primary();
            $table->string('CustomerName', 50)->nullable();
            $table->bigInteger('PhoneNumber')->nullable();
            $table->string('Address', 100)->nullable();
            $table->string('Email', 100)->nullable();
            $table->integer('NumberOfOrders')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
