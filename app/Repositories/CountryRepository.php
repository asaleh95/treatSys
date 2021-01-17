<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Doctor;

class CountryRepository
{
    public $country;

    public function __construct(Country $country) {
        $this->country = $country;
    }

    public function all()
    {      
        return $this->country->all();
    }
}