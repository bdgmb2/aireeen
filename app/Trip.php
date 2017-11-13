<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Trip
 *
 * @property int $id
 * @property int $passengerID
 * @property int $flightID
 * @property string $seat
 * @property int $bags
 * @property int|null $nextFlight
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereBags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereFlightID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereNextFlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip wherePassengerID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereSeat($value)
 * @mixin \Eloquent
 */
class Trip extends Model
{
    //
    protected $table = 'trips';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
