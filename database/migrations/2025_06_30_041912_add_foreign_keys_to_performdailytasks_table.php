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
        Schema::table('performdailytasks', function (Blueprint $table) {
            $table->foreign(['TaskID'], 'fk_PDT_Task')->references(['TaskID'])->on('dailytasks');
            $table->foreign(['EmployeeID'], 'fk_PDT_Employee')->references(['EmployeeID'])->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('performdailytasks', function (Blueprint $table) {
            $table->dropForeign('fk_PDT_Task');
            $table->dropForeign('fk_PDT_Employee');
        });
    }
};
