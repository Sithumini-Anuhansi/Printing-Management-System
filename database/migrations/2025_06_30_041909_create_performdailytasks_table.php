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
        Schema::create('performdailytasks', function (Blueprint $table) {
            $table->integer('TaskID')->index('fk_PDT_Task');
            $table->integer('EmployeeID')->index('fk_PDT_Employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performdailytasks');
    }
};
