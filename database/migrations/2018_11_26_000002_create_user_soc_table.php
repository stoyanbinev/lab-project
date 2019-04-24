<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Author: Swapnil Paul


class CreateUserSocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_soc', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('DOB');
            $table->string('email');
            $table->string('phone');
            $table->unsignedInteger('idUserType');
            $table->foreign('idUserType')->references('idUserType')->on('user_type');
            $table->unsignedInteger('idUserStatus');
            $table->foreign('idUserStatus')->references('idUserStatus')->on('user_status');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
