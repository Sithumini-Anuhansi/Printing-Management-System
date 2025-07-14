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
        Schema::table('stocklevel', function (Blueprint $table) {
            $table->foreign(['MaterialID'], 'stocklevel_ibfk_1')->references(['MaterialID'])->on('material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocklevel', function (Blueprint $table) {
            $table->dropForeign('stocklevel_ibfk_1');
        });
    }
};
