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
        Schema::table('delivery', function (Blueprint $table) {
            $table->foreign(['OrderID'], 'delivery_ibfk_2')->references(['OrderID'])->on('order');
            $table->foreign(['CustomerID'], 'delivery_ibfk_1')->references(['CustomerID'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery', function (Blueprint $table) {
            $table->dropForeign('delivery_ibfk_2');
            $table->dropForeign('delivery_ibfk_1');
        });
    }
};
