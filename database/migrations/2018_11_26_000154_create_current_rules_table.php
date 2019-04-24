<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//Author: Swapnil Paul

class CreateCurrentRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_rules', function (Blueprint $table) {
            $table->increments('idRule');
            $table->integer('rentPeriod');
            $table->integer('extensionNumber');
            $table->integer('extensionPeriod');
            $table->integer('rentNumber');
            $table->integer('banPeriod');
            $table->integer('itmNotReturned');
            $table->string('itmNotReturnedPeriod',5);
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
        Schema::dropIfExists('current_rules');
    }
}
