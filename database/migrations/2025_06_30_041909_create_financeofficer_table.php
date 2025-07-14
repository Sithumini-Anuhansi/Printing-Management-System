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
        Schema::create('financeofficer', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->string('PayrollCycle', 20)->nullable();
            $table->decimal('AuthorizedExpenseLimit', 10)->nullable();
            $table->integer('HandledTransactions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financeofficer');
    }
};
