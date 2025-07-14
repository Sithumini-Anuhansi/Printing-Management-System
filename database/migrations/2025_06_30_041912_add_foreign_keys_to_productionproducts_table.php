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
        Schema::table('productionproducts', function (Blueprint $table) {
            $table->foreign(['ProductID'], 'productionproducts_ibfk_2')->references(['ProductID'])->on('product');
            $table->foreign(['ProductionID'], 'productionproducts_ibfk_1')->references(['ProductionID'])->on('production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productionproducts', function (Blueprint $table) {
            $table->dropForeign('productionproducts_ibfk_2');
            $table->dropForeign('productionproducts_ibfk_1');
        });
    }
};
