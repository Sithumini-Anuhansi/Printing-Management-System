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
        Schema::table('purchaserequest', function (Blueprint $table) {
            $table->foreign(['PurchaseListID'], 'purchaserequest_ibfk_1')->references(['PurchaseListID'])->on('purchaselist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchaserequest', function (Blueprint $table) {
            $table->dropForeign('purchaserequest_ibfk_1');
        });
    }
};
