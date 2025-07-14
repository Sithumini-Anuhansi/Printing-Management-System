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
        Schema::table('materialusage', function (Blueprint $table) {
            $table->foreign(['MaterialID'], 'materialusage_ibfk_2')->references(['MaterialID'])->on('material');
            $table->foreign(['OrderID'], 'materialusage_ibfk_1')->references(['OrderID'])->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materialusage', function (Blueprint $table) {
            $table->dropForeign('materialusage_ibfk_2');
            $table->dropForeign('materialusage_ibfk_1');
        });
    }
};
