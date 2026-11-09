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
        Schema::table('orderproducts', function (Blueprint $table) {
            $table->foreign(['ProductID'], 'orderproducts_ibfk_2')->references(['ProductID'])->on('product');
            $table->foreign(['OrderID'], 'orderproducts_ibfk_1')->references(['OrderID'])->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderproducts', function (Blueprint $table) {
            $table->dropForeign('orderproducts_ibfk_2');
            $table->dropForeign('orderproducts_ibfk_1');
        });
    }
};
