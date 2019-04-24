<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Author: Swapnil Paul


class CreateExtentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extention', function (Blueprint $table) {
            $table->increments('idExtension');
            $table->date('expiryExtension');
            $table->integer('numberOfExtension');
            $table->unsignedInteger('idRent');
            $table->foreign('idRent')->references('idRent')->on('rents');         
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
        Schema::dropIfExists('extention');
    }
}
