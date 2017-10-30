<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    //
    protected $table = 'aircraft';
    protected $primaryKey = 'model';
    protected $keyType = 'string';
    public $timestamps = false;
}