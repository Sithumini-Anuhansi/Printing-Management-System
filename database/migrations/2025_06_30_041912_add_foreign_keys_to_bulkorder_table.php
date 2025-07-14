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
        Schema::table('bulkorder', function (Blueprint $table) {
            $table->foreign(['OrderID'], 'bulkorder_ibfk_1')->references(['OrderID'])->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulkorder', function (Blueprint $table) {
            $table->dropForeign('bulkorder_ibfk_1');
        });
    }
};
