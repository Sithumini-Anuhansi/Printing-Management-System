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
        Schema::table('production', function (Blueprint $table) {
            $table->foreign(['QualityCheckID'], 'fk_Production_QualityCheck')->references(['QualityCheckID'])->on('qualityrecords');
            $table->foreign(['OrderID'], 'fk_Production_Order')->references(['OrderID'])->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production', function (Blueprint $table) {
            $table->dropForeign('fk_Production_QualityCheck');
            $table->dropForeign('fk_Production_Order');
        });
    }
};
