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
        Schema::create('purchaserequest', function (Blueprint $table) {
            $table->integer('PurchaseRequestID')->primary();
            $table->date('Date')->nullable();
            $table->string('Description')->nullable();
            $table->string('ApprovalStatus', 20)->nullable();
            $table->integer('PurchaseListID')->nullable()->index('PurchaseListID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaserequest');
    }
};
