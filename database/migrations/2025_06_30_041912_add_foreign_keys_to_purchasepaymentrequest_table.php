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
        Schema::table('purchasepaymentrequest', function (Blueprint $table) {
            $table->foreign(['PurchaseRequestID'], 'purchasepaymentrequest_ibfk_1')->references(['PurchaseRequestID'])->on('purchaserequest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasepaymentrequest', function (Blueprint $table) {
            $table->dropForeign('purchasepaymentrequest_ibfk_1');
        });
    }
};
