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
        Schema::create('inventorymanager', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->integer('TotalSuppliers')->nullable();
            $table->integer('TotalMaterialTracked')->nullable();
            $table->string('CriticalMaterialList')->nullable();
            $table->date('LastRestockDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventorymanager');
    }
};
