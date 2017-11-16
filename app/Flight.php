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

    public static function intermediate(Airport $first, Airport $second, float $percent)
    {

        $lat1 = ($first->latitude * 3.14159) / 180;
        $lng1 = ($first->longitude * 3.14159) / 180;
        $lat2 = ($second->latitude * 3.14159) / 180;
        $lng2 = ($second->longitude * 3.14159) / 180;

        $f = $percent / 100;

        $d = App\Airport::getDistance($first, $second);

        $A = sin((1 - $f) * $d) / sin($d);
        $B = sin($f * $d) / sin($d);
        $x = ($A * cos($lat1) * cos($lng1)) + $B *
            cos($lat2) * cos($lng2);
        $y = ($A * cos($lat1) * sin($lng1)) + $B *
            cos($lat2) * sin($lng2);
        $z = ($A * sin($lat1)) + ($B * sin($lat2));
        $latitude = atan2($z, sqrt(pow($x, 2) +
            pow($y, 2)));
        $longitude = atan2($y, $x);

        $retLat = ($latitude * 180) / 3.14159;
        $retLng = ($longitude * 180) / 3.14159;

        return [ 'latitude' => $retLat, 'longitude' => $retLng ];
    }
}