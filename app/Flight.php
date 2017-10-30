<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $table = 'flights';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sourceAirport() { return $this->belongsTo('App\Airport', 'sourceAirport', 'icao'); }
    public function destinationAirport() { return $this->belongsTo('App\Airport', 'destinationAirport', 'icao'); }
    public function aircraftModel() { return $this->hasOne('App\Aircraft', 'aircraftModel', 'model'); }
}
