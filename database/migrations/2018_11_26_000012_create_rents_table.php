<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Author: Swapnil Paul

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('idRent');
            $table->date('dateRented');
            $table->date('expiryRent');
            $table->date('dateReturned');
            $table->boolean('booked');
            $table->boolean('extraExtension');
            $table->unsignedInteger('idInventory');
            $table->unsignedInteger('idUser');
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
        Schema::dropIfExists('rents');
    }
}
