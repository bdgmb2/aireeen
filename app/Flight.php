<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Flight extends Model
{
    //
    protected $table = 'flights';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function sourceAirport() { return $this->belongsTo('App\Airport', 'sourceAirport', 'icao'); }
    public function destinationAirport() { return $this->belongsTo('App\Airport', 'destinationAirport', 'icao'); }
    public function aircraftModel() { return $this->belongsTo('App\Aircraft', 'aircraftModel', 'model'); }

    public function getDepartureTimeAttribute($value)
    {
        return new \DateTime($value, new \DateTimeZone($this->sourceAirport()->first()->timezone));
    }

    public function getArrivalTimeAttribute($value)
    {
        return new \DateTime($value, new \DateTimeZone($this->destinationAirport()->first()->timezone));
    }
}