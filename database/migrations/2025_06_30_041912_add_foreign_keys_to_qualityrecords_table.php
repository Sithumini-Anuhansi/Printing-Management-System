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
        Schema::table('qualityrecords', function (Blueprint $table) {
            $table->foreign(['ProductionID'], 'qualityrecords_ibfk_1')->references(['ProductionID'])->on('production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qualityrecords', function (Blueprint $table) {
            $table->dropForeign('qualityrecords_ibfk_1');
        });
    }
};
