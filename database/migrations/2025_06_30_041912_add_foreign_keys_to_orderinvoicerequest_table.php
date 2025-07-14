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
        Schema::table('orderinvoicerequest', function (Blueprint $table) {
            $table->foreign(['OrderInvoiceID'], 'orderinvoicerequest_ibfk_1')->references(['OrderInvoiceID'])->on('orderinvoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderinvoicerequest', function (Blueprint $table) {
            $table->dropForeign('orderinvoicerequest_ibfk_1');
        });
    }
};
