<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Airport
 *
 * @property string $icao
 * @property string $name
 * @property string $city
 * @property string $state
 * @property float $latitude
 * @property float $longitude
 * @property int $altitude
 * @property string $timezone
 * @property int $activity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereIcao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Airport whereTimezone($value)
 * @mixin \Eloquent
 */
class Airport extends Model
{
    //
    protected $table = 'airports';
    protected $primaryKey = 'icao';
    protected $keyType = 'string';
    public $timestamps = false;

    public static function getDistance(Airport $first, Airport $second)
    {
        $radLatA = (3.14159 * $first->latitude) / 180;
        $radLatB = (3.14159 * $second->latitude) / 180;
        $radLonA = (3.14159 * $first->longitude) / 180;
        $radLonB = (3.14159 * $second->longitude) / 180;
        $radius = 3956;
        $longitudeDiff = $radLonB - $radLonA;
        $latitudeDiff = $radLatB - $radLatA;
        $a = pow(sin($latitudeDiff / 2), 2) + cos($radLatA) * cos($radLatB) * pow(sin($longitudeDiff / 2), 2);
        $c = 2 * asin(min(1, sqrt($a)));
        return $radius * $c;
    }
}
