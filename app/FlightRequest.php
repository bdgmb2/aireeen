<?php

namespace App;


class FlightRequest
{
    public $source;
    public $destination;
    public $tripType;
    public $departDate;
    public $returnDate;
    public $numTickets;

    public $accessToken;
    public function generateToken()
    {
        $this->accessToken = str_random(32);
    }
}