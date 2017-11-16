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

// TOPLEVEL
Route::get('/', 'mainPage@homepage')->name('home');

// ABOUT PAGES
Route::get('/about', 'aboutPages@mainAbout')->name('about');
Route::get('/about/travelinfo', 'aboutPages@travelInfo')->name('about.travelinfo');
Route::get('/about/destinations', 'aboutPages@destinations')->name('about.destinations');

// FLIGHT PUCHASING
Route::post('/bookFlight', 'bookFlight@find')->name('flights.search');
Route::get('/bookFlight/progress/{token}', 'bookFlight@progress')->name('flights.prog');
Route::get('/bookFlight/searchResults/{token}/{sortBy?}/{type?}', 'bookFlight@results')->name('flights.pick');

// MANAGE FLIGHT BOOKING

// CHECK FLIGHT STATUS
Route::post('/check_status', 'bookFlight@active')->name('status');

// EEEN CLUB
Route::get('/eeen_club', 'eeenClub@accountPage')->name('eeenclub.home')->middleware('eeenClubAuth');
Route::get('/eeen_club/login', function() { return view('eeenclub.login'); })->name('eeenclub.loginpage');
Route::get('/eeen_club/register', function() { return view('eeenclub.register'); })->name('eeenclub.registerpage');

Route::post('/eeen_club/authenticate', 'eeenClub@login')->name('eeenclub.login');
Route::get('/eeen_club/logout', 'eeenClub@logout')->name('eeenclub.logout')->middleware('eeenClubAuth');
Route::post('/eeen_club/doRegister', 'eeenClub@register')->name('eeenclub.register');