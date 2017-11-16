<?php

use Illuminate\Database\Seeder;

class flightSeed extends Seeder
{
    static protected function getDistance(float $latA, float $lonA, float $latB, float $lonB) {
        $radius = 3956;
        $longitudeDiff = $lonB - $lonA;
        $latitudeDiff = $latB - $latA;
        $a = pow(sin($latitudeDiff / 2), 2) + cos($latA) * cos($latB) * pow(sin($longitudeDiff / 2), 2);
        $c = 2 * asin(min(1, sqrt($a)));
        return $radius * $c;
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

    static protected function calculateArrivalTime(DateTime $departureTime, int $distance, int $airspeed) {
        $base = 30; //Give 30 minutes outside of cruise speed
        $cruiseTime = ($distance / $airspeed) * 60;
        $totalDurationMinutes = $base + $cruiseTime;

        return $departureTime->add(new DateInterval($totalDurationMinutes));
    }

    static protected function generateAircraft(int $sourceActivity, int $destinationActivity, int $distance, Illuminate\Support\Collection $potentialAircraft) {
        $optimalRange = $distance * 1.2;
        $filteredAircraft = $potentialAircraft->filter(function(App\Aircraft $item) use ($optimalRange) {
            return $item->range >= $optimalRange;
        });
        $filteredAircraft = $filteredAircraft->filter(function(App\Aircraft $item) use ($sourceActivity, $destinationActivity) {
            if (($sourceActivity == 1 || $destinationActivity == 1) && $item->class != "small")
                return false;
            elseif ($sourceActivity >= 1 && $destinationActivity >= 1 && $item->class == "small")
                return false;
            else return true;
        });
        return $filteredAircraft->random();
    }

    static protected function determineNumberOfFlights(int $activityLevel) {
        if ($activityLevel == 1)
            return rand(5, 8);
        if ($activityLevel == 2)
            return rand(7, 12);
        if ($activityLevel == 3)
            return rand(15, 22);
        if ($activityLevel == 4)
            return rand(30, 45);
        if ($activityLevel == 5)
            return rand(50, 60);
        else
            return 0;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numDays = 15;
        $earliestHour = 4;
        $latestHour = 23;

        $start = new DateTime();
        $start = $start->setTime(0, 0);
        $start = $start->modify('+1 day');

        for ($i = $start; $i <= $start->modify('+' . $numDays . ' day'); $i = $i->modify('+1 day')) {
            $flightNumberIncrement = 350;

            //Get a list of all airports, sorted by hubs first, etc.
            $airports = App\Airport::all();
            $potAircraft = App\Aircraft::all();
            foreach ($airports as $airport) {

                $potentialDestinations = $airports->filter(function(App\Airport $item) use ($airport) {
                    if ($item == $airport) return false;
                    else return true;
                });
                $potentialDestinations->each(function(App\Airport $destination, $key) use ($airport) {
                    $destination = $destination->union(['distance' => self::getDistance($airport->latitude, $airport->longitude, $destination->latitude, $destination->longitude)]);
                });
                $airports = $airports->sortByDesc('activity')->sortBy('distance');

                $numFlightsAllowed = self::determineNumberOfFlights($airport->activity);
                $numFlightsCurrent = 0;

                //Check flights coming in to the airport first, those must be matched
                $flightsInto = App\Flight::whereDestinationAirport($airport);
                foreach ($flightsInto as $outgoing) {
                    $distance = self::getDistance($airport->latitude, $airport->longitude, $outgoing->latitude, $outgoing->longitude);
                    $aircraft = self::generateAircraft($airport->activity, $outgoing->activity, $distance, $potAircraft);
                    $departureTime = $i->setTime(rand($earliestHour, $latestHour), rand(0, 59));
                    $arrivalTime = self::calculateArrivalTime($departureTime, $distance, $aircraft->speed);
                    $departingFlight = new App\Flight([
                        'flightNumber' => 'AE' . $flightNumberIncrement,
                        'sourceAirport' => $airport,
                        'destinationAirport' => $outgoing,
                        'aircraftModel' => $aircraft,
                        'departureTime' => $departureTime,
                        'arrivalTime' => $arrivalTime,
                        'miles' => $distance,
                        'firstPrice' => self::calculateFirstPrice($distance),
                        'economyPrice' => self::calculateEconomyPrice($distance),
                        'wifi' => rand(0, 1)
                    ]);
                    $departingFlight->save();
                    $flightNumberIncrement++;
                    $numFlightsCurrent++;
                }
                // If there's still flights allowed out of this airport, create some new flights!
                while ($numFlightsCurrent < $numFlightsAllowed) {
                    $flightNumberIncrement++;
                    $numFlightsCurrent++;
                }
            }
        }
    }

}
