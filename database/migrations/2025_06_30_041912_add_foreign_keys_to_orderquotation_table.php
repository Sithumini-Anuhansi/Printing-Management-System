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
        Schema::table('orderquotation', function (Blueprint $table) {
            $table->foreign(['OrderID'], 'orderquotation_ibfk_2')->references(['OrderID'])->on('order');
            $table->foreign(['CustomerID'], 'orderquotation_ibfk_1')->references(['CustomerID'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderquotation', function (Blueprint $table) {
            $table->dropForeign('orderquotation_ibfk_2');
            $table->dropForeign('orderquotation_ibfk_1');
        });
    }
};
