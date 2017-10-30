<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    //
    protected $table = 'airports';
    protected $primaryKey = 'icao';
    protected $keyType = 'string';
    public $timestamps = false;
}
