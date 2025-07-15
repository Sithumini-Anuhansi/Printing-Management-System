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
        Schema::table('receivenotification', function (Blueprint $table) {
            $table->foreign(['UserID'], 'fk_RN_User')->references(['UserID'])->on('users');
            $table->foreign(['NotificationID'], 'fk_RN_Notification')->references(['NotificationID'])->on('notification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receivenotification', function (Blueprint $table) {
            $table->dropForeign('fk_RN_User');
            $table->dropForeign('fk_RN_Notification');
        });
    }
};
