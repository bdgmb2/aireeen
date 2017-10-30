<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['airports' => App\Airport::all()]);
});

Route::get('/about', function() {
    return view('about.about');
});

Route::get('/about/destinations', function() {
    return view('about.wherefly', [
        'flightPaths' => App\Flight::where('departureTime', '<=', date_modify((new DateTime())->setTime(0, 0, 0), '+2 day'))
            ->select('sourceAirport', 'destinationAirport')
            ->distinct()
            ->get(),
        'airports' => App\Airport::all()]);
});