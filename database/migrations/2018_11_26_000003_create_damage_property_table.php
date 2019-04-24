<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//Author: Swapnil Paul

class CreateDamagePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_property', function (Blueprint $table) {
            $table->unsignedInteger('idInventory');
            $table->unsignedInteger('idUser');
            $table->primary(['idInventory', 'idUser']);
            $table->integer('fee');
            $table->boolean('refunded');
            $table->string('info');
            $table->foreign('idInventory')->references('idInventory')->on('inventory');
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
        Schema::dropIfExists('damage_property');
    }
}
