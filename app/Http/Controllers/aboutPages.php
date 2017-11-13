<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class aboutPages extends Controller
{
    public function __construct()
    {
        $this->middleware('eeenClubAuth:false');
    }

    public function mainAbout(Request $request)
    {
        return view('about.about', [
            'passenger' => $request->get('passenger'),
            'account' => $request->get('account')
        ]);
    }

    public function destinations(Request $request)
    {
        return view('about.wherefly', [
            'passenger' => $request->get('passenger'),
            'account' => $request->get('account'),
            'airports' => App\Airport::all(),
            'flightPaths' => App\Flight::where('departureTime', '<=', date_modify((new \DateTime())->setTime(0, 0, 0), '+2 day'))
                ->select('sourceAirport', 'destinationAirport')
                ->distinct()
                ->get()
        ]);
    }

    public function travelInfo(Request $request)
    {
        return 'Unimplemented';
    }
}
