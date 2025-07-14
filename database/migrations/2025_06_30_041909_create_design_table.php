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
        Schema::create('design', function (Blueprint $table) {
            $table->integer('DesignID')->primary();
            $table->date('Date')->nullable();
            $table->binary('Design')->nullable();
            $table->string('Description')->nullable();
            $table->string('ApprovalStatus', 20)->nullable();
            $table->string('PrintingStatus', 20)->nullable();
            $table->integer('OrderID')->nullable()->index('OrderID');
            $table->integer('ProductionID')->nullable()->index('ProductionID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design');
    }
};
