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
        Schema::table('productionmanager', function (Blueprint $table) {
            $table->foreign(['UserID'], 'fk_PM_User')->references(['UserID'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productionmanager', function (Blueprint $table) {
            $table->dropForeign('fk_PM_User');
        });
    }
};
