<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Author: Swapnil Paul

class CreateBanLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban_logs', function (Blueprint $table) {
            $table->increments('idBanLog');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('info');
            $table->unsignedInteger('idUser');
            $table->foreign('idUser')->references('idUser')->on('user_soc');                    
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
        Schema::dropIfExists('ban_logs');
    }
}
