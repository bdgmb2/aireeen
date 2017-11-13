<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Passenger
 *
 * @property int $id
 * @property string|null $title
 * @property string $firstName
 * @property string $lastName
 * @property string|null $suffix
 * @property string $gender
 * @property string $dateOfBirth
 * @property string $customerSince
 * @property string $email
 * @property string|null $phoneCountry
 * @property string|null $phone
 * @property-read \App\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereCustomerSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger wherePhoneCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Passenger whereTitle($value)
 * @mixin \Eloquent
 */
class Passenger extends Model
{
    //
    protected $table = 'passengers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['firstName', 'lastName', 'suffix', 'title', 'gender', 'email', 'phoneCountry', 'phone', 'dateOfBirth'];

    public static $surnameValues = ['Mr.', 'Ms.', 'Mrs.', 'Miss', 'Dr.'];
    public static $suffixValues = ['Jr.', 'Sr.', 'M.D.', 'II', 'III', 'IV', 'V'];

    public function account() { return $this->hasOne('App\Account', 'passengerID', 'id'); }
}
