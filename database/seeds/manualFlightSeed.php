<?php

use Illuminate\Database\Seeder;

class manualFlightSeed extends Seeder
{
    static protected $flightRoutes;

    function __construct() {
        self::$flightRoutes = array(
            // CONNECTIONS FROM HUB CHARLOTTE DOUGLAS (KCLT)
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KRDU'), 'frequency' => 4],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KATL'), 'frequency' => 8],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KCHS'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSAV'), 'frequency' => 2],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KTLH'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KMDW'), 'frequency' => 9],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KBOS'), 'frequency' => 2],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KRIC'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('TJSJ'), 'frequency' => 6],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSEA'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KMIA'), 'frequency' => 8],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KMSY'), 'frequency' => 4],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KTPA'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KLIT'), 'frequency' => 2],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KORF'), 'frequency' => 2],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSTL'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KIAD'), 'frequency' => 5],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KCVG'), 'frequency' => 1],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KDEN'), 'frequency' => 2],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KPIT'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSDF'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KBNA'), 'frequency' => 5],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KBHM'), 'frequency' => 3],
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KMSP'), 'frequency' => 17], //HUB
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSLC'), 'frequency' => 17], //HUB
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KIAH'), 'frequency' => 18], //HUB
            ['first' => App\Airport::find('KCLT'), 'second' => App\Airport::find('KSWF'), 'frequency' => 12], //HUB

            // CONNECTIONS FROM HUB MINNEAPOLIS (KMSP)
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KFAR'), 'frequency' => 4],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KBIS'), 'frequency' => 4],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KDLH'), 'frequency' => 4],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KFSD'), 'frequency' => 2],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KMWC'), 'frequency' => 5],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KPIR'), 'frequency' => 2],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KLAN'), 'frequency' => 3],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KDTW'), 'frequency' => 5],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KSDF'), 'frequency' => 2],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KCVG'), 'frequency' => 3],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KCLE'), 'frequency' => 4],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KLAS'), 'frequency' => 4],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KBUF'), 'frequency' => 2],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KBIL'), 'frequency' => 3],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KCMH'), 'frequency' => 1],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KATL'), 'frequency' => 5],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KICT'), 'frequency' => 3],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KIAD'), 'frequency' => 2],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KSEA'), 'frequency' => 5],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KMCI'), 'frequency' => 6],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KSTL'), 'frequency' => 6],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KIND'), 'frequency' => 3],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KRAP'), 'frequency' => 7],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KOMA'), 'frequency' => 9],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KMDW'), 'frequency' => 12],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KDEN'), 'frequency' => 8],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KDSM'), 'frequency' => 7],
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KSLC'), 'frequency' => 18], //HUB
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KIAH'), 'frequency' => 12], //HUB
            ['first' => App\Airport::find('KMSP'), 'second' => App\Airport::find('KSWF'), 'frequency' => 14], //HUB

            // CONNECTIONS FROM HUB SALT LAKE (KSLC)
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KDEN'), 'frequency' => 9],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSTL'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KCOS'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KCYS'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KJAC'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KRNO'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KLAS'), 'frequency' => 7],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KLAX'), 'frequency' => 10],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KTWF'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KBIS'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KTUS'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KBTM'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KBIL'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSFO'), 'frequency' => 6],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KPDX'), 'frequency' => 6],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('PHNL'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KOAK'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSMF'), 'frequency' => 5],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KELP'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSEA'), 'frequency' => 7],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KMSO'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KBOI'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSAF'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KRAP'), 'frequency' => 3],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KGEG'), 'frequency' => 2],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KPHX'), 'frequency' => 7],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KABQ'), 'frequency' => 4],
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KIAH'), 'frequency' => 18], //HUB
            ['first' => App\Airport::find('KSLC'), 'second' => App\Airport::find('KSWF'), 'frequency' => 6], //HUB

            // CONNECTIONS FROM HUB HOUSTON (KIAH)
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KAUS'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KMSY'), 'frequency' => 3],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KDEN'), 'frequency' => 6],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KELP'), 'frequency' => 3],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KABI'), 'frequency' => 4],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KDFW'), 'frequency' => 6],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KLBB'), 'frequency' => 3],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KTPA'), 'frequency' => 4],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KABQ'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KMIA'), 'frequency' => 7],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KATL'), 'frequency' => 7],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KBRO'), 'frequency' => 3],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KLIT'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KPHX'), 'frequency' => 3],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KSAT'), 'frequency' => 4],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KOKC'), 'frequency' => 6],
            ['first' => App\Airport::find('KIAH'), 'second' => App\Airport::find('KSWF'), 'frequency' => 7], //HUB

            // CONNECTIONS FROM HUB STEWARD (KSWF)
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KDTW'), 'frequency' => 4],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KMDW'), 'frequency' => 6],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KBUF'), 'frequency' => 3],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KBTV'), 'frequency' => 4],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KPWM'), 'frequency' => 4],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KSYR'), 'frequency' => 3],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KPIT'), 'frequency' => 6],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KPHL'), 'frequency' => 6],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KIAD'), 'frequency' => 7],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KMIA'), 'frequency' => 4],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KBOS'), 'frequency' => 6],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KBDL'), 'frequency' => 3],
            ['first' => App\Airport::find('KSWF'), 'second' => App\Airport::find('KORF'), 'frequency' => 2],

            // WEST COAST AIRPORTS
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KPDX'), 'frequency' => 6],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KGEG'), 'frequency' => 3],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KLAS'), 'frequency' => 2],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KLAX'), 'frequency' => 3],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KLAX'), 'frequency' => 3],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('PHNL'), 'frequency' => 2],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KSAN'), 'frequency' => 3],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('PANC'), 'frequency' => 4],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KMSO'), 'frequency' => 2],
            ['first' => App\Airport::find('KSEA'), 'second' => App\Airport::find('KMFR'), 'frequency' => 1],

            ['first' => App\Airport::find('KPDX'), 'second' => App\Airport::find('KMFR'), 'frequency' => 1],
            ['first' => App\Airport::find('KPDX'), 'second' => App\Airport::find('KBOI'), 'frequency' => 2],
            ['first' => App\Airport::find('KPDX'), 'second' => App\Airport::find('KOAK'), 'frequency' => 2],
            ['first' => App\Airport::find('KPDX'), 'second' => App\Airport::find('KMSO'), 'frequency' => 2],

            ['first' => App\Airport::find('KOAK'), 'second' => App\Airport::find('KRNO'), 'frequency' => 2],

            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('PHNL'), 'frequency' => 3],
            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('KSAN'), 'frequency' => 3],
            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('KSFO'), 'frequency' => 2],
            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('KLAS'), 'frequency' => 2],
            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('PITO'), 'frequency' => 1],
            ['first' => App\Airport::find('KLAX'), 'second' => App\Airport::find('KPHX'), 'frequency' => 2],

            ['first' => App\Airport::find('PHNL'), 'second' => App\Airport::find('POGG'), 'frequency' => 5],
            ['first' => App\Airport::find('PHNL'), 'second' => App\Airport::find('PITO'), 'frequency' => 5],
            ['first' => App\Airport::find('PHNL'), 'second' => App\Airport::find('PLIH'), 'frequency' => 2],

            ['first' => App\Airport::find('PITO'), 'second' => App\Airport::find('POGG'), 'frequency' => 3],

            ['first' => App\Airport::find('KSAN'), 'second' => App\Airport::find('KPHX'), 'frequency' => 2],

            ['first' => App\Airport::find('PANC'), 'second' => App\Airport::find('PAFA'), 'frequency' => 5],
            ['first' => App\Airport::find('PANC'), 'second' => App\Airport::find('PFYU'), 'frequency' => 2],
            ['first' => App\Airport::find('PANC'), 'second' => App\Airport::find('PADQ'), 'frequency' => 2],
            ['first' => App\Airport::find('PANC'), 'second' => App\Airport::find('PJNU'), 'frequency' => 3],

            // EAST COAST AIRPORTS

            ['first' => App\Airport::find('KBOS'), 'second' => App\Airport::find('KIAD'), 'frequency' => 3],
            ['first' => App\Airport::find('KBOS'), 'second' => App\Airport::find('KPHL'), 'frequency' => 3],
            ['first' => App\Airport::find('KBOS'), 'second' => App\Airport::find('KBTV'), 'frequency' => 2],

            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KPHL'), 'frequency' => 4],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KCVG'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KPIT'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KMDW'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KRDU'), 'frequency' => 2],
            ['first' => App\Airport::find('KIAD'), 'second' => App\Airport::find('KATL'), 'frequency' => 3],

            ['first' => App\Airport::find('KATL'), 'second' => App\Airport::find('KMDW'), 'frequency' => 3],
            ['first' => App\Airport::find('KATL'), 'second' => App\Airport::find('KTPA'), 'frequency' => 3],
            ['first' => App\Airport::find('KATL'), 'second' => App\Airport::find('KMIA'), 'frequency' => 5],
            ['first' => App\Airport::find('KATL'), 'second' => App\Airport::find('KBHM'), 'frequency' => 2],
            ['first' => App\Airport::find('KATL'), 'second' => App\Airport::find('KBNA'), 'frequency' => 2],

            ['first' => App\Airport::find('KMIA'), 'second' => App\Airport::find('TJSJ'), 'frequency' => 3],
            ['first' => App\Airport::find('KMIA'), 'second' => App\Airport::find('KTPA'), 'frequency' => 3],
            ['first' => App\Airport::find('KMIA'), 'second' => App\Airport::find('KTLH'), 'frequency' => 2],
        );
    }

    static protected function calculateFirstPrice(int $distance) {
        $base = 200;
        $gen = sqrt($distance) * 18;
        return $base + $gen + rand(-30, 30);
    }

    static protected function calculateEconomyPrice(int $distance) {
        $base = 50;
        $gen = sqrt($distance) * 9;
        return $base + $gen + rand(-70, 70);
    }

    static protected function calculateArrivalTime(DateTime $departureTime, int $distance, int $airspeed, string $timezone) {
        $base = 30; //Give 30 minutes outside of cruise speed
        $cruiseTime = ($distance / ($airspeed * 0.9)) * 60;
        $totalDurationMinutes = round($base + $cruiseTime);
        //$this->command->info("Total duration in minutes is: " . $totalDurationMinutes);
        //$this->command->info("Departure time is: " . date_format($departureTime, 'h:i') . " " . $departureTime->getTimezone()->getName());
        $toreturn = (clone $departureTime)->add(new DateInterval('PT' . $totalDurationMinutes . 'M'))->setTimezone(new DateTimeZone($timezone));
        //$this->command->info("Arrival time is: " . date_format($toreturn, 'h:i') . " " . $toreturn->getTimezone()->getName());
        return $toreturn;
    }

    static protected function generateAircraft(int $sourceActivity, int $destinationActivity, int $distance, Illuminate\Support\Collection $potentialAircraft) {
        $optimalRange = $distance * 1.25;
        $filteredAircraft = $potentialAircraft->filter(function(App\Aircraft $item) use ($optimalRange) {
            return $item->range >= $optimalRange;
        });
        $filteredAircraft = $filteredAircraft->filter(function(App\Aircraft $item) use ($sourceActivity, $destinationActivity) {
            if (($sourceActivity == 1 || $destinationActivity == 1) && $item->class != "small")
                return false;
            elseif ($sourceActivity > 1 && $destinationActivity > 1 && $item->class == "small")
                return false;
            else return true;
        });
        return $filteredAircraft->random();
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = new DateTime();
        $start->setTime(0, 0);
        $start->modify('-1 day');
        $end = clone $start;
        $end->modify('+10 day');

        $aircraftList = App\Aircraft::all();

        for ($i = clone $start; $i <= $end; $i->modify('+1 day')) {
            $counter = 0;
            $flightNumberIncrement = 350;
            foreach (self::$flightRoutes as $route) {
                $distance = App\Airport::getDistance($route['first'], $route['second']);
                for ($k = 1; $k <= $route['frequency']; $k++) {

                    // Going from First to Second
                    $flightNumberIncrement++;
                    $counter++;
                    //$this->command->info("Doing " . $route['first']->icao . " -> " . $route['second']->icao);
                    $aircraft = $this->generateAircraft($route['first']->activity, $route['second']->activity, $distance, $aircraftList);
                    $departureTime = (clone $i)->setTimezone(new DateTimeZone($route['first']->timezone))->setTime(rand(4, 22), rand(0, 59));
                    //$departureTime = new DateTime(, new DateTimeZone($route['first']->timezone));
                    $arrivalTime = self::calculateArrivalTime($departureTime, $distance, $aircraft->speed, $route['second']->timezone);
                    $toadd = new App\Flight([
                        'flightNumber' => $flightNumberIncrement,
                        'sourceAirport' => $route['first']->icao,
                        'destinationAirport' => $route['second']->icao,
                        'departureTime' => $departureTime,
                        'arrivalTime' => $arrivalTime,
                        'miles' => $distance,
                        'aircraftModel' => $aircraft->model,
                        'firstPrice' => self::calculateFirstPrice($distance),
                        'economyPrice' => self::calculateEconomyPrice($distance),
                        'wifi' => rand(0, 1)
                    ]);
                    $toadd->save();

                    // Going from Second to First
                    $flightNumberIncrement++;
                    $counter++;
                    //$this->command->info("Doing " . $route['second']->icao . " -> " . $route['first']->icao);
                    $aircraft = $this->generateAircraft($route['second']->activity, $route['first']->activity, $distance, $aircraftList);
                    $departureTime = (clone $i)->setTime(rand(4, 22), rand(0, 59))->setTimezone(new DateTimeZone($route['second']->timezone));
                    $arrivalTime = self::calculateArrivalTime($departureTime, $distance, $aircraft->speed, $route['first']->timezone);
                    $toadd = new App\Flight([
                        'flightNumber' => $flightNumberIncrement,
                        'sourceAirport' => $route['second']->icao,
                        'destinationAirport' => $route['first']->icao,
                        'departureTime' => $departureTime,
                        'arrivalTime' => $arrivalTime,
                        'miles' => $distance,
                        'aircraftModel' => $aircraft->model,
                        'firstPrice' => self::calculateFirstPrice($distance),
                        'economyPrice' => self::calculateEconomyPrice($distance),
                        'wifi' => rand(0, 1),
                        'meals' => ($distance < 500 ? rand(0, 1) : min(rand(0, 6), 1))
                    ]);
                    $toadd->save();
                }
            }
            $this->command->info("There are " . $counter . " flights on " . date_format($i, 'm-d-Y'));
        }
    }
}