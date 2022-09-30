<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_vehicles', function (Blueprint $table) {
            $table->string('id')->primary()->comment('Registration number');
            $table->unsignedInteger('vehicle_type_id');
            $table->integer('entrance_time');
            $table->unsignedInteger('discount_card_id')->nullable();

            //foreign keys
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->foreign('discount_card_id')->references('id')->on('discount_cards');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registered_vehicles');
    }
}
