<?php

namespace App\Services;

use App\Repositories\HospitalRepositories;

class HospitalService
{

    private $hospitalRepo;

    public function __construct(HospitalRepositories $hospitalRepo)
    {
        $this->hospitalRepo = $hospitalRepo;
    }

    public function all($data)
    {
        return $this->hospitalRepo->all($data);
    }
}
