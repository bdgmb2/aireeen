<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Aircraft
 *
 * @property string $model
 * @property string $name
 * @property int $range
 * @property int $speed
 * @property string $class
 * @property string $firstLayout
 * @property int $firstRows
 * @property string $economyLayout
 * @property int $economyRows
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereEconomyLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereEconomyRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereFirstLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereFirstRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aircraft whereSpeed($value)
 * @mixin \Eloquent
 */
class Aircraft extends Model
{
    //
    protected $table = 'aircraft';
    protected $primaryKey = 'model';
    protected $keyType = 'string';
    public $timestamps = false;
}
