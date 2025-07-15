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
        Schema::create('purchaselist', function (Blueprint $table) {
            $table->integer('PurchaseListID')->primary();
            $table->date('Date')->nullable();
            $table->decimal('TotalAmount', 10)->nullable();
            $table->integer('MaterialID')->nullable()->index('MaterialID');
            $table->integer('PurchaseRequestID')->nullable()->index('fk_PurchaseList_PurchaseRequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaselist');
    }
};
