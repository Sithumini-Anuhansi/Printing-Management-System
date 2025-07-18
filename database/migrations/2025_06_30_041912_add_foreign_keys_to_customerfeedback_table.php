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
        Schema::table('customerfeedback', function (Blueprint $table) {
            $table->foreign(['CustomerID'], 'customerfeedback_ibfk_1')->references(['CustomerID'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customerfeedback', function (Blueprint $table) {
            $table->dropForeign('customerfeedback_ibfk_1');
        });
    }
};
