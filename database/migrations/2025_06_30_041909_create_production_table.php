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
        Schema::create('production', function (Blueprint $table) {
            $table->integer('ProductionID')->primary();
            $table->date('ProductionDate')->nullable();
            $table->integer('PrintingQuantity')->nullable();
            $table->integer('NumberOfOrders')->nullable();
            $table->string('Description')->nullable();
            $table->string('ProductionStatus', 20)->nullable();
            $table->integer('OrderID')->nullable()->index('fk_Production_Order');
            $table->integer('QualityCheckID')->nullable()->index('fk_Production_QualityCheck');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production');
    }
};
