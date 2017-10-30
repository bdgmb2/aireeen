<?php

use Illuminate\Database\Seeder;

class passengerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Passenger::class, 5000)->create();
    }
}
