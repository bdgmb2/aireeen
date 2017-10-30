<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //
    protected $table = 'passengers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function account() { return $this->hasOne('App\Account', 'passengerID', 'id'); }
}
