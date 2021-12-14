<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFligthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fligths', function (Blueprint $table) {
            $table->id('flightNumber');
            $table->string('departureAirport');
            $table->string('arrivalAirport');
            $table->date('departureDate');
            $table->integer('passengerNumber');
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
        Schema::dropIfExists('fligths');
    }
}
