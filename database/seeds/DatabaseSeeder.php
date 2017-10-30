<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Generating airports...");
        $this->call(airportSeed::class);
        $this->command->info("Generating aircraft...");
        $this->call(aircraftSeed::class);
        $this->command->info("Generating passengers...");
        $this->call(passengerSeed::class);
        $this->command->info("Generating flights...");
        $this->call(manualFlightSeed::class);
    }
}
