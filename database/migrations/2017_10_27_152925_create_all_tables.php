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
        $icaoLength = 4;

        Schema::create('passengers', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('title', App\Passenger::$surnameValues)->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('suffix', App\Passenger::$suffixValues)->nullable();
            $table->char('gender', 1);
            $table->date('dateOfBirth');
            $table->date('customerSince')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('email');
            $table->char('phoneCountry', 3)->nullable();
            $table->string('phone', 20)->nullable();
        });
        DB::statement("ALTER TABLE passengers ADD CHECK (gender = 'm' || gender = 'f');");

        Schema::create('passenger_accounts', function(Blueprint $table) {
            $table->unsignedBigInteger('passenger');
            $table->foreign('passenger')->references('id')->on('passengers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('loginUsername')->index();
            $table->string('loginPassword');
            $table->boolean('confirmedEmail')->default(false);
            $table->integer('status')->default(0);
            $table->unsignedInteger('miles')->default(0);
            $table->unsignedInteger('accumulatedMiles')->default(0);
        });
        DB::statement("ALTER TABLE passenger_accounts ADD CHECK (status < " . count(App\Account::$statusEnum) . ");");

        Schema::create('airports', function(Blueprint $table) use ($icaoLength) {
            $table->char('icao', $icaoLength);
            $table->primary('icao');
            $table->string('name');
            $table->string('city');
            $table->string('state', 20);
            $table->float('latitude');
            $table->float('longitude');
            $table->unsignedInteger('altitude');
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
            $table->index(['departureTime', 'arrivalTime']);
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
