<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('houseId');
            $table->integer('typeId')->nullable();
            $table->decimal('pricePerDay');
            $table->integer('placeNumber');
            $table->foreign('houseId')->references('id')->on('houses');
            $table->foreign('typeId')->references('id')->on('parking_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkings');
    }
}
