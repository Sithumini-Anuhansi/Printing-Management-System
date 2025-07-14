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
        Schema::create('logisticsofficer', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->integer('TotalDeliveryEmployees')->nullable();
            $table->integer('TotalPackagingStaff')->nullable();
            $table->integer('TotalDeliveriesHandled')->nullable();
            $table->integer('QCReportsCreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logisticsofficer');
    }
};
