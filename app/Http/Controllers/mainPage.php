<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class mainPage extends Controller
{
    public function __construct()
    {
        $this->middleware('eeenClubAuth:false');
    }

    public function homepage(Request $request)
    {
        return view('home', [
            'passenger' => $request->get('passenger'),
            'account' => $request->get('account'),
            'airports' => App\Airport::all()
        ]);
    }
}