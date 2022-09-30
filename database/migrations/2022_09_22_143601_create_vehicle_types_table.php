<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 50);
            $table->string('name', 255);
            $table->integer('place_taken');
            $table->double('day_fee');
            $table->double('night_fee');
        });

        DB::table('vehicle_types')->insert([
            ['category' => 'A', 'name' => 'Car', 'place_taken' => 1, 'day_fee' => 3, 'night_fee' => 2],
            ['category' => 'A', 'name' => 'Motorcycle', 'place_taken' => 1, 'day_fee' => 3, 'night_fee' => 2],
            ['category' => 'B', 'name' => 'Bus', 'place_taken' => 2, 'day_fee' => 6, 'night_fee' => 4],
            ['category' => 'C', 'name' => 'Autobus', 'place_taken' => 4, 'day_fee' => 12, 'night_fee' => 8],
            ['category' => 'C', 'name' => 'Truck', 'place_taken' => 4, 'day_fee' => 12, 'night_fee' => 8],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_types');
    }
}
