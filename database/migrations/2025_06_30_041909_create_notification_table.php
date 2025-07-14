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
        Schema::create('notification', function (Blueprint $table) {
            $table->integer('NotificationID')->primary();
            $table->date('Date')->nullable();
            $table->string('Type', 20)->nullable();
            $table->string('Description')->nullable();
            $table->integer('AnnouncementID')->nullable()->index('fk_Notification_Announcement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification');
    }
};
