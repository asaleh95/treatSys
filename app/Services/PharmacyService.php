<?php

namespace App\Services;

use App\Repositories\PharmacyRepositories;
use App\Repositories\RayRepositories;

class PharmacyService
{

    private $pharmacyRepositories;

    public function __construct(PharmacyRepositories $pharmacyRepositories)
    {
        $this->pharmacyRepositories = $pharmacyRepositories;
    }

    public function all($data)
    {
        return $this->pharmacyRepositories->all($data);
    }
}
