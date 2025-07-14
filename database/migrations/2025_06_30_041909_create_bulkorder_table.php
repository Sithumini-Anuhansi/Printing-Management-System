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
        Schema::create('bulkorder', function (Blueprint $table) {
            $table->integer('OrderID');
            $table->integer('BulkOrderID');
            $table->date('ApprovalDate')->nullable();
            $table->string('ApprovalStatus', 20)->nullable();

            $table->primary(['OrderID', 'BulkOrderID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulkorder');
    }
};
