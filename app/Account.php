<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'passenger_accounts';
    protected $primaryKey = 'passengerID';
    public $timestamps = false;

    public function passenger() { return $this->belongsTo('App\Passenger'); }
}
