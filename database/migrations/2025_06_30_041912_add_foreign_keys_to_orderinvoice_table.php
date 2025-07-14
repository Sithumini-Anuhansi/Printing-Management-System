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
        Schema::table('orderinvoice', function (Blueprint $table) {
            $table->foreign(['OrderID'], 'orderinvoice_ibfk_2')->references(['OrderID'])->on('order');
            $table->foreign(['CustomerID'], 'orderinvoice_ibfk_1')->references(['CustomerID'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderinvoice', function (Blueprint $table) {
            $table->dropForeign('orderinvoice_ibfk_2');
            $table->dropForeign('orderinvoice_ibfk_1');
        });
    }
};
