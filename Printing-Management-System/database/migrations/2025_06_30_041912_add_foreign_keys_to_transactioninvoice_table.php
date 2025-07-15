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
        Schema::table('transactioninvoice', function (Blueprint $table) {
            $table->foreign(['TransactionID'], 'fk_TI_Transaction')->references(['TransactionID'])->on('transaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactioninvoice', function (Blueprint $table) {
            $table->dropForeign('fk_TI_Transaction');
        });
    }
};
