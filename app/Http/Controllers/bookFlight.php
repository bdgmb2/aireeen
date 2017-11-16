<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Validator;

use App;

class bookFlight extends Controller
{
    public function __construct()
    {
        $this->middleware('eeenClubAuth:false');
    }

    public function find(Request $request)
    {
        $request->flash();

        $validator = Validator::make($request->all(), [
            'fromICAO' => 'required|exists:airports,icao',
            'toICAO' => 'required|exists:airports,icao|different:fromICAO',
            'dateDeparting' => 'required|after:today',
            'dateReturning' => 'required_if:tripType,roundtrip',
            'numPassengers' => 'digits_between:1,8',
            'preferredClass' => 'in:Economy,First'
        ], [
            'fromICAO.required' => 'The \'From\' Airport is required.',
            'fromICAO.exists' => 'Air EEEN does not fly from that airport.',
            'toICAO.required' => 'The \'To\' Airport is required.',
            'toICAO.exists' => 'Air EEEN does not fly to that airport',
            'toICAO.same' => 'The departure and arrival airport cannot be the same.',
            'dateDeparting.required' => 'A departure date is required.',
            'dateDeparting.after' => 'You cannot book a flight departing today online. Please call us to book a same-day flight.',
            'dateReturning.required_if' => 'You have selected round-trip. A return date is required.',
            'dateReturning.after' => 'The return date must be after the departure date.',
            'numPassengers.digits_between' => 'You can only select between 1 and 8 passengers. For more than 8 passengers, please call us to book group tickets.',
            'preferredClass:in' => 'Quit playing with the dropdowns. Select \'Economy\' or \'First\'.'
        ])->sometimes('dateReturning', 'after:dateDeparting', function($input) {
            return $input->tripType == "roundtrip";
        });

        if ($validator->errors()->count() > 0)
            return redirect()->route('home')->withErrors($validator->errors(), 'find_flights');
        else
        {
            $newRequest = new App\FlightRequest();
            $newRequest->source = App\Airport::find($request->input('fromICAO'));
            $newRequest->destination = App\Airport::find($request->input('toICAO'));
            $newRequest->tripType = $request->input('tripType');
            $newRequest->departDate = $request->input('dateDeparting');
            $newRequest->returnDate = $request->input('dateReturning');
            $newRequest->numTickets = $request->input('numPassengers');
            $newRequest->generateToken();

            event(new \App\Events\FlightSearch($newRequest));

            return view('book.loading', [ 'req' => $newRequest ]);
        }
    }

    public function progress(string $token)
    {
        if ($token != null)
        {
            $getValue = Cache::get('flightsearch:' . $token);
            if ($getValue == null)
                return response('', 404);
            else
                return response('', 200);
        }
        return response('', 400);
    }

    public function results(string $token, string $sortBy = 'totalDuration', string $type = null)
    {
        if (Cache::has('flightsearch:' . $token))
        {
            //Reset expiration time
            $fromCache = Cache::get('flightsearch:' . $token);
            Cache::set('flightsearch:' . $token, $fromCache, \Carbon\Carbon::now()->addMinutes(env('FLIGHTSEARCH_CACHE_EXPIRY')));

            if ($sortBy != null)
            {
                switch ($sortBy)
                {
                    case 'economyPrice':
                        $fromCache['searchResults'] = $fromCache['searchResults']->sortBy(function ($item, $key) { return $item['totalEconomy']; });
                        break;
                    case 'firstPrice':
                        $fromCache['searchResults'] = $fromCache['searchResults']->sortBy(function ($item, $key) { return $item['totalFirst']; });
                        break;
                    case 'departureTime':
                        $fromCache['searchResults'] = $fromCache['searchResults']->sortBy(function ($item, $key) { return $item['flight'][0]->departureTime; });
                        break;
                    case 'arrivalTime':
                        $fromCache['searchResults'] = $fromCache['searchResults']->sortBy(function ($item, $key) { return $item['flight'][$item['legs'] - 1]->arrivalTime; });
                        break;
                    case 'totalDuration':
                        $fromCache['searchResults'] = $fromCache['searchResults']->sortBy(function ($item, $key) {
                            return ($item['flight'][$item['legs'] - 1]->arrivalTime)->getTimestamp() - ($item['flight'][0]->departureTime)->getTimestamp();
                        });
                        break;
                    default:
                        abort(400, "sortBy value not valid.");
                }
            }

            return view('book.results', ['token' => $token, 'results' => $fromCache, 'activeSort' => $sortBy]);
        }
        else return response('', 404);
    }

    public function active(Request $request)
    {
        $request->flash();

        $validator = Validator::make($request->all(), [
            'flightNumber' => 'integer'
        ], [
            'flightNumber.required' => 'A flight number or route is required.',
            'flightNumber.integer' => 'Enter a number in the \'Flight Number\' field. Please omit the \'AE\' from the flight number.',
            'fromICAO.required' => 'The \'From\' field is required if checking a flight via an airport.',
            'toICAO.required' => 'The \'To\' field is required if checking a flight via an airport.',
        ])->sometimes('flightNumber', 'required', function($input) {
            return ($input->fromICAO == "" || $input->toICAO == "");
        })->sometimes('fromICAO', 'required', function($input) {
            return ($input->flightNumber == "" && $input->toICAO == "");
        })->sometimes('toICAO', 'required', function($input) {
            return ($input->flightNumber == "" && $input->fromICAO == "");
        });

        if ($validator->errors()->count() > 0)
            return redirect('/')->withErrors($validator->errors(), 'flight_status');

        $flightNumber = $request->input('flightNumber');
        if ($request->input('flightDate') == 'today')
            $dateSearch = new \DateTime('midnight');
        else if ($request->input('flightDate') == 'yesterday')
            $dateSearch = (new \DateTime('midnight'))->modify('-1 day');
        else if ($request->input('flightDate') == 'tomorrow')
            $dateSearch = (new \DateTime('midnight'))->modify('+1 day');
        else
            return redirect('/')->withErrors(collect(['The date format was incorrect. Please try again.']), 'flight_status');

        $flight = App\Flight::where([['flightNumber', $flightNumber], ['departureTime', '>=', $dateSearch]])->first();

        if ($flight == null)
            return redirect()->route('home')->withErrors(collect(['Sorry, we were unable to find any flights with flight number ' . $flightNumber]), 'flight_status');

        $departureAirport = $flight->sourceAirport()->first();
        $arrivalAirport = $flight->destinationAirport()->first();
        $aircraftModel = $flight->aircraftModel()->first();

        // Get Flight's Status
        $clearDeparture = (clone $flight->departureTime)->setTimeZone(new \DateTimeZone('UTC'));
        $clearArrival = (clone $flight->arrivalTime)->setTimeZone(new \DateTimeZone('UTC'));
        $nowUTC = new \DateTime(null, new \DateTimeZone('UTC'));

        if ($clearDeparture >= $nowUTC)
        {
            $status = "Will depart at " . $flight->departureTime->format('h:i A T, F jS Y');// . ", Current Time: " . (new \DateTime())->format('h:i A T, F jS Y');
            //$status = "Will depart at " . $clearDeparture->format('h:i A T, F jS Y') . ", Current Time: " . $nowUTC->format('h:i A T, F jS Y');
            $locationLatitude = $departureAirport->latitude;
            $locationLongitude = $departureAirport->longitude;
            $airspeed = 0;
            $altitude = $departureAirport->altitude;
        }
        else if ($clearDeparture < $nowUTC && $clearArrival >= $nowUTC)
        {
            $status = "In-Flight: Departed at: " . $flight->departureTime->format('h:i A T, F jS Y') . ", Will Arrive at: " . $flight->arrivalTime->format('h:i A T, F jS Y');
            $percentComplete = (($nowUTC->getTimestamp() - $clearDeparture->getTimestamp()) / ($clearArrival->getTimestamp() - $clearDeparture->getTimeStamp())) * 100;
            $inter = App\Flight::intermediate($departureAirport, $arrivalAirport, $percentComplete);
            $locationLatitude = $inter['latitude'];
            $locationLongitude = $inter['longitude'];
            $airspeed = round(-64*pow((($percentComplete / 100) - 0.5), 6) + 1) * $aircraftModel->speed;
            $altitude = round(-64*pow((($percentComplete / 100) - 0.5), 6) + 1) * (rand(30000, 35000));
        }
        else if ($clearArrival < $nowUTC)
        {
            $status = "Arrived at " . $flight->arrivalTime->format('h:i A T, F jS Y');// . ", Current Time: " . (new \DateTime())->format('h:i A T, F jS Y');
            //$status = "Arrived at " . $clearArrival->format('h:i A T, F jS Y') . ", Current Time: " . $nowUTC->format('h:i A T, F jS Y');
            $locationLatitude = $arrivalAirport->latitude;
            $locationLongitude = $arrivalAirport->longitude;
            $airspeed = 0;
            $altitude = $arrivalAirport->altitude;
        }
        else
        {
            $status = "WTF this shouldn't happen.";
            $locationLatitude = 0;
            $locationLongitude = 0;
            $airspeed = -5;
            $altitude = -1000;
        }

        return view('flightstatus', [
            'passenger' => $request->get('passenger'),
            'account' => $request->get('account'),
            'flightNumber' => $flight->flightNumber,
            'status' => $status,
            'altitude' => $altitude,
            'airspeed' => $airspeed,
            'aircraftName' => $aircraftModel->name,
            'locationLatitude' => $locationLatitude,
            'locationLongitude' => $locationLongitude,
            'departureAirport' => $departureAirport,
            'arrivalAirport' => $arrivalAirport,
            'wifi' => $flight->wifi
        ]);
    }
}