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
        Schema::create('dailytasks', function (Blueprint $table) {
            $table->integer('TaskID')->primary();
            $table->string('TaskType', 20)->nullable();
            $table->date('TaskDate')->nullable();
            $table->string('Description')->nullable();
            $table->string('DailyProgress', 20)->nullable();
            $table->integer('UserID')->nullable()->index('fk_DT_User');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailytasks');
    }
};
