<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App;

class Account extends Model
{
    //
    protected $table = 'passenger_accounts';
    protected $primaryKey = 'passengerID';
    public $timestamps = false;

    public static $statusEnum = [ 0 => 'none', 1 => 'silver', 2 => 'gold', 3 => 'platinum'];
    public static $pointCalc = [ 0 => 0, 1 => 10000, 2 => 20000, 3 => 32500 ];

    //public function passenger() { return App\Passenger::where('id', $this->passenger)->first(); }
    public function passenger() { return $this->belongsTo(App\Passenger::class, 'passenger', 'id'); }
}