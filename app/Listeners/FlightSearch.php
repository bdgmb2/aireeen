<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App;
use \Illuminate\Support\Facades\Cache;
use \Illuminate\Support\Facades\Log;
use \Carbon\Carbon;
use \Illuminate\Database\Eloquent\Collection;

class FlightSearch implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(App\Events\FlightSearch $event)
    {
        Cache::put('flightsearch:' . $event->flightRequest->accessToken, null, Carbon::now()->addMinutes(env('FLIGHTSEARCH_CACHE_EXPIRY')));

        // Get all flights leaving the day of departure and the next day
        $flightPool = App\Flight::where('departureTime', '>=', Carbon::parse($event->flightRequest->departDate))
            ->where('departureTime', '<=', Carbon::parse($event->flightRequest->departDate)->addDays(2))->get();

        $nonstop = $this->getNonStopFlights($flightPool, $event->flightRequest->source->icao, $event->flightRequest->destination->icao, $event->flightRequest->departDate);
        $onestop = $this->getOneStopFlights($flightPool, $event->flightRequest->source->icao, $event->flightRequest->destination->icao, $event->flightRequest->departDate);
        $twostop = collect();
        $threestop = collect();

        if ($nonstop->count() + $onestop->count() < 50)
            $twostop = $this->getTwoStopFlights($flightPool, $event->flightRequest->source->icao, $event->flightRequest->destination->icao, $event->flightRequest->departDate);

        if ($nonstop->count() + $onestop->count() + $twostop->count() < 5)
            $threestop = $this->getThreeStopFlights($flightPool, $event->flightRequest->source->icao, $event->flightRequest->destination->icao, $event->flightRequest->departDate);


        $results = [
            'request' => $event->flightRequest,
            'searchResults' => $nonstop->concat($onestop)->concat($twostop)->concat($threestop)
            //return ($item['flight'][$item['legs'] - 1]->arrivalTime)->getTimestamp() - ($item['flight'][0]->departureTime)->getTimestamp();
        ];

        Cache::put('flightsearch:' . $event->flightRequest->accessToken, $results, Carbon::now()->addMinutes(15));
    }

    /**
     * Handle a job failure.
     *
     * @param FlightSearch $event
     * @param $exception
     */
    public function failed(App\Events\FlightSearch $event, $exception)
    {
        Log::error("Failed from " . $event->flightRequest->source->icao . " to " . $event->flightRequest->destination->icao);
        Log::error("Exception text: " . $exception);
    }

    private function getNonStopFlights(Collection $pool, string $sourceICAO, string $destinationICAO, string $departDate)
    {
        $nonstopFlights = $pool->where('sourceAirport', $sourceICAO)
            ->where('destinationAirport', $destinationICAO)
            ->where('departureTime', '<', Carbon::parse($departDate)->addDay());
        $returnArray = collect();

        foreach ($nonstopFlights as $single)
        {
            $returnArray->push(collect([
                'flight' => [$single],
                'legs' => 1,
                'totalEconomy' => $single->economyPrice,
                'totalFirst' => $single->firstPrice
            ]));
        }
        return $returnArray;
    }

    private function getOneStopFlights(Collection $pool, string $sourceICAO, string $destinationICAO, string $departDate)
    {
        $potLeg1 = $pool->where('sourceAirport', $sourceICAO)
            ->where('destinationAirport', '!=', $destinationICAO)
            ->where('departureTime', '<', Carbon::parse($departDate)->addDay());
        $returnArray = collect();

        foreach ($potLeg1->all() as $leg1)
        {
            $potLeg2 = $pool->where('sourceAirport', $leg1->destinationAirport)
                ->where('destinationAirport', $destinationICAO)
                ->where('departureTime', '>', Carbon::instance($leg1->arrivalTime)->addMinutes(30))
                ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());

            foreach ($potLeg2 as $leg2)
            {
                $returnArray->push(collect([
                    'flight' => [$leg1, $leg2],
                    'legs' => 2,
                    'totalEconomy' => floor(($leg1->economyPrice + $leg2->economyPrice) * 0.5),
                    'totalFirst' => floor(($leg1->firstPrice + $leg2->firstPrice) * 0.5)
                ]));
            }
        }
        return $returnArray;
    }

    private function getTwoStopFlights(Collection $pool, string $sourceICAO, string $destinationICAO, string $departDate)
    {
        $potLeg1 = $pool->where('sourceAirport', $sourceICAO)
            ->where('destinationAirport', '!=', $destinationICAO)
            ->where('departureTime', '<', Carbon::parse($departDate)->addDay());
        $returnArray = collect();

        foreach ($potLeg1->all() as $leg1)
        {
            $potLeg2 = $pool->where('sourceAirport', $leg1->destinationAirport)
                ->where('destinationAirport', '!=', $destinationICAO)
                ->where('destinationAirport', '!=', $sourceICAO)
                ->where('departureTime', '>', Carbon::instance($leg1->arrivalTime)->addMinutes(30))
                ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());

            foreach ($potLeg2->all() as $leg2)
            {
                $potLeg3 = $pool->where('sourceAirport', $leg2->destinationAirport)
                    ->where('destinationAirport', $destinationICAO)
                    ->where('departureTime', '>', Carbon::instance($leg2->arrivalTime)->addMinutes(30))
                    ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());

                foreach ($potLeg3 as $leg3)
                {
                    $returnArray->push(collect([
                        'flight' => [$leg1, $leg2, $leg3],
                        'legs' => 3,
                        'totalEconomy' => floor(($leg1->economyPrice + $leg2->economyPrice + $leg3->economyPrice) * 0.6),
                        'totalFirst' => floor(($leg1->firstPrice + $leg2->firstPrice + $leg3->firstPrice) * 0.5)
                    ]));
                }
            }
        }

        return $returnArray;
    }

    private function getThreeStopFlights(Collection $pool, string $sourceICAO, string $destinationICAO, string $departDate)
    {
        $potLeg1 = $pool->where('sourceAirport', $sourceICAO)
            ->where('destinationAirport', '!=', $destinationICAO)
            ->where('departureTime', '<', Carbon::parse($departDate)->addDay());
        $returnArray = collect();

        foreach ($potLeg1->all() as $leg1)
        {
            $potLeg2 = $pool->where('sourceAirport', $leg1->destinationAirport)
                ->where('destinationAirport', '!=', $destinationICAO)
                ->where('destinationAirport', '!=', $sourceICAO)
                ->where('departureTime', '>', Carbon::instance($leg1->arrivalTime)->addMinutes(30))
                ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());

            foreach ($potLeg2->all() as $leg2)
            {
                $potLeg3 = $pool->where('sourceAirport', $leg2->destinationAirport)
                    ->where('destinationAirport', '!=', $destinationICAO)
                    ->where('sourceAirport', '!=', $sourceICAO)
                    ->where('departureTime', '>', Carbon::instance($leg2->arrivalTime)->addMinutes(30))
                    ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());
                foreach ($potLeg3->all() as $leg3)
                {
                    $potLeg4 = $pool->where('sourceAirport', $leg3->destinationAirport)
                        ->where('destinationAirport', $destinationICAO)
                        ->where('departureTime', '>', Carbon::instance($leg3->arrivalTime)->addMinutes(30))
                        ->where('departureTime', '<', Carbon::instance($leg1->arrivalTime)->addDay());
                    foreach ($potLeg4 as $leg4)
                    {
                        $returnArray->push(collect([
                            'flight' => [$leg1, $leg2, $leg3, $leg4],
                            'legs' => 4,
                            'totalEconomy' => floor(($leg1->economyPrice + $leg2->economyPrice + $leg3->economyPrice + $leg4->economyPrice) * 0.5),
                            'totalFirst' => floor(($leg1->firstPrice + $leg2->firstPrice + $leg3->firstPrice + $leg4->firstPrice) * 0.5)
                        ]));
                    }
                }
            }
        }
        return $returnArray;
    }
}
