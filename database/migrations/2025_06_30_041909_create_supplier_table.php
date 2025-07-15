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
        Schema::create('supplier', function (Blueprint $table) {
            $table->integer('SupplierID')->primary();
            $table->string('SupplierName', 50)->nullable();
            $table->string('SupplierType', 25)->nullable();
            $table->bigInteger('PhoneNumber')->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Address', 100)->nullable();
            $table->string('WarehouseLocation', 100)->nullable();
            $table->string('AvailableMaterial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};
