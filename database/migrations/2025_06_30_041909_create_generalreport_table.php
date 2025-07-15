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
        Schema::create('generalreport', function (Blueprint $table) {
            $table->integer('GeneralReportID')->primary();
            $table->date('Date')->nullable();
            $table->string('GeneralReportType', 50)->nullable();
            $table->string('Author', 100)->nullable();
            $table->string('Description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generalreport');
    }
};
