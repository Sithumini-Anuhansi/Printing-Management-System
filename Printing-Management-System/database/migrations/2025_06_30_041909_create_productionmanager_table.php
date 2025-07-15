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
        Schema::create('productionmanager', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->integer('SupervisedEmployees')->nullable();
            $table->integer('PrintJobsHandled')->nullable();
            $table->integer('PendingJobs')->nullable();
            $table->integer('MachineCountManaged')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productionmanager');
    }
};
