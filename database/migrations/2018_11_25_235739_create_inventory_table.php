<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//  Author Swapnil Paul

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('idInventory');
            $table->string('tile',70);
            $table->boolean('availability');
            $table->integer('releaseYear');
            $table->boolean('rentStatus');
            $table->string('company',100);
            $table->string('image');
            $table->double('rating');
            $table->unsignedInteger('idPlatform');
            $table->unsignedInteger('idCategory');
            $table->unsignedInteger('idCollectionType');
            $table->foreign('idPlatform')->references('idPlatform')->on('platform');
            $table->foreign('idCategory')->references('idCategory')->on('category');
            $table->foreign('idCollectionType')->references('idCollectionType')->on('collection_type');
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
        Schema::dropIfExists('inventory');
    }
}
