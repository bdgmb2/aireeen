<?php

use Illuminate\Database\Seeder;

class aircraftSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('aircraft')->insert([
            [
                'model' => 'B737-M7',
                'name' => 'Boeing 737 MAX 7',
                'range' => 3800,
                'speed' => 570,
                'class' => 'medium',
                'firstLayout' => 'ff ff',
                'firstRows' => 3,
                'economyLayout' => 'eee eee',
                'economyRows' => 17
            ],
            [
                'model' => 'B737-M8',
                'name' => 'Boeing 737 MAX 8',
                'range' => 3500,
                'speed' => 600,
                'class' => 'medium',
                'firstLayout' => 'ff ff',
                'firstRows' => 4,
                'economyLayout' => 'eee eee',
                'economyRows' => 24
            ],
            [
                'model' => 'B737-M9',
                'name' => 'Boeing 737 MAX 9',
                'range' => 3500,
                'speed' => 600,
                'class' => 'medium',
                'firstLayout' => 'ff ff',
                'firstRows' => 4,
                'economyLayout' => 'eee eee',
                'economyRows' => 28
            ],
            [
                'model' => 'B787-9',
                'name' => 'Boeing 787-9 Dreamliner',
                'range' => 7000,
                'speed' => 650,
                'class' => 'large',
                'firstLayout' => 'f ff f',
                'firstRows' => 7,
                'economyLayout' => 'ee eee ee',
                'economyRows' => 34
            ],
            [
                'model' => 'B787-10',
                'name' => 'Boeing 787-9 Dreamliner',
                'range' => 6800,
                'speed' => 640,
                'class' => 'large',
                'firstLayout' => 'f ff f',
                'firstRows' => 8,
                'economyLayout' => 'ee eee ee',
                'economyRows' => 36
            ],
            [
                'model' => 'B777X-8',
                'name' => 'Boeing 777X',
                'range' => 8700,
                'speed' => 600,
                'class' => 'large',
                'firstLayout' => 'ff fff ff',
                'firstRows' => 8,
                'economyLayout' => 'eee eeee eee',
                'economyRows' => 40
            ],
            [
                'model' => 'CRJ-1000',
                'name' => 'Bombardier CRJ-1000',
                'range' => 1600,
                'speed' => 500,
                'class' => 'small',
                'firstLayout' => 'f f',
                'firstRows' => 2,
                'economyLayout' => 'ee ee',
                'economyRows' => 18
            ],
            [
                'model' => 'CRJ-700',
                'name' => 'Bombardier CRJ-700',
                'range' => 1400,
                'speed' => 540,
                'class' => 'small',
                'firstLayout' => 'f f',
                'firstRows' => 1,
                'economyLayout' => 'ee ee',
                'economyRows' => 16
            ]
        ]);
    }
}
