<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class searchFlights extends Controller
{
    //
    public function find(Request $request)
    {
        Validator::make($request->all(), [
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
        })
            ->validate();
        return 'Yes';
    }
}
