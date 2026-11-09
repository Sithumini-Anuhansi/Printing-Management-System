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
        Schema::table('design', function (Blueprint $table) {
            $table->foreign(['ProductionID'], 'design_ibfk_2')->references(['ProductionID'])->on('production');
            $table->foreign(['OrderID'], 'design_ibfk_1')->references(['OrderID'])->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('design', function (Blueprint $table) {
            $table->dropForeign('design_ibfk_2');
            $table->dropForeign('design_ibfk_1');
        });
    }
};
