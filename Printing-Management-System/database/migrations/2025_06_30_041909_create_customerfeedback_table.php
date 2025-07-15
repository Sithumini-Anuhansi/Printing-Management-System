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
        Schema::create('customerfeedback', function (Blueprint $table) {
            $table->integer('FeedbackID')->primary();
            $table->string('Description')->nullable();
            $table->integer('CustomerID')->nullable()->index('CustomerID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerfeedback');
    }
};
