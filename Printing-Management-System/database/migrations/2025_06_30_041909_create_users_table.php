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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->string('Name', 50);
            $table->string('Password', 100);
            $table->string('Email', 100);
            $table->string('Role', 25);
            $table->integer('Age')->nullable();
            $table->string('Address', 100)->nullable();
            $table->integer('ProfileID')->nullable()->index('fk_User_Profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
