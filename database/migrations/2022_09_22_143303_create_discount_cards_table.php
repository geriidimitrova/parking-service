<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('value');
        });

        DB::table('discount_cards')->insert([
            ['name' => 'Silver', 'value' => 10],
            ['name' => 'Gold', 'value' => 15],
            ['name' => 'Platnium', 'value' => 20],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_cards');
    }
}
