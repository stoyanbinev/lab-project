<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//Author: Swapnil Paul

class CreateUserStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_status', function (Blueprint $table) {
            $table->unsignedInteger('idUserStatus');
            $table->primary('idUserStatus');
            $table->integer('totalRents');
            $table->date('lastUpdate');
            $table->unsignedInteger('idStatusType');
            $table->foreign('idStatusType')->references('idStatusType')->on('status_type');
            $table->unsignedInteger('idUser');
            //$table->foreign('idUser')->references('idUser')->on('user');
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
        Schema::dropIfExists('user_status');
    }
}
