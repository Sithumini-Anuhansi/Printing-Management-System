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
        Schema::create('stocklevel', function (Blueprint $table) {
            $table->integer('StockLevelID')->primary();
            $table->integer('MaterialQuantity')->nullable();
            $table->date('Date')->nullable();
            $table->integer('MaterialID')->nullable()->index('MaterialID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocklevel');
    }
};
