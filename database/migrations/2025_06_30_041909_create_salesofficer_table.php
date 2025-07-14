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
        Schema::create('salesofficer', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->integer('TotalCustomers')->nullable();
            $table->decimal('SalesAchieved', 10)->nullable();
            $table->integer('TotalSalesmen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesofficer');
    }
};
