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
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('EmployeeID')->primary();
            $table->string('Name', 50)->nullable();
            $table->bigInteger('PhoneNumber')->nullable();
            $table->integer('Age')->nullable();
            $table->string('Position', 25)->nullable();
            $table->string('Department', 25)->nullable();
            $table->string('Address', 100)->nullable();
            $table->string('Email', 100)->nullable();
            $table->decimal('Salary', 10)->nullable();
            $table->string('ProgressStatus', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
