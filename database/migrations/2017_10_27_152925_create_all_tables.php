<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $aircraftModelLength = 10;
        $icaoLength = 5;

        Schema::create('passengers', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->date('customerSince');
            $table->string('email');
            $table->string('phone', 20)->nullable();
        });
        Schema::create('passenger_accounts', function(Blueprint $table) {
            $table->unsignedBigInteger('passenger');
            $table->foreign('passenger')->references('id')->on('passengers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('loginUsername');
            $table->string('loginPassword');
            $table->enum('status', ['none', 'silver', 'gold', 'platinum'])->default('none');
            $table->unsignedInteger('miles')->default(0);
        });
        Schema::create('airports', function(Blueprint $table) use ($icaoLength) {
            $table->string('icao', $icaoLength);
            $table->primary('icao');
            $table->string('name');
            $table->string('city');
            $table->string('state');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('timezone');
            $table->unsignedInteger('activity');
        });
        Schema::create('aircraft', function(Blueprint $table) use ($aircraftModelLength) {
            $table->string('model', $aircraftModelLength);
            $table->primary('model');
            $table->string('name');
            $table->unsignedInteger('range');
            $table->unsignedInteger('speed');
            $table->enum('class', ['small', 'medium', 'large']);
            $table->string('firstLayout');
            $table->unsignedInteger('firstRows');
            $table->string('economyLayout');
            $table->unsignedInteger('economyRows');
        });
        Schema::create('flights', function(Blueprint $table) use ($icaoLength, $aircraftModelLength) {
            $table->bigIncrements('id');
            $table->string('flightNumber');
            $table->string('sourceAirport', $icaoLength);
            $table->foreign('sourceAirport')->references('icao')->on('airports');
            $table->string('destinationAirport', $icaoLength);
            $table->foreign('destinationAirport')->references('icao')->on('airports');
            $table->dateTime('departureTime');
            $table->dateTime('arrivalTime');
            $table->string('aircraftModel', $aircraftModelLength);
            $table->foreign('aircraftModel')->references('model')->on('aircraft');
            $table->unsignedInteger('miles');
            $table->integer('firstPrice');
            $table->integer('economyPrice');
            $table->boolean('wifi')->default(0);
        });
        Schema::create('trips', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('passengerID');
            $table->foreign('passengerID')->references('id')->on('passengers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('flightID');
            $table->foreign('flightID')->references('id')->on('flights')->onDelete('cascade')->onUpdate('cascade');
            $table->string('seat');
            $table->unsignedInteger('bags')->default(0);
            $table->unsignedBigInteger('nextFlight')->nullable();
            $table->foreign('nextFlight')->references('id')->on('trips')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trips');
        Schema::drop('flights');
        Schema::drop('passenger_accounts');
        Schema::drop('passengers');
        Schema::drop('airports');
        Schema::drop('aircraft');
    }
}
