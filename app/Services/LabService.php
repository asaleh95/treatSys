<?php

namespace App\Services;

use App\Repositories\LabRepositories;

class LabService
{

    private $labRepositories;

    public function __construct(LabRepositories $labRepositories)
    {
        $this->labRepositories = $labRepositories;
    }

    public function all($data)
    {
        return $this->labRepositories->all($data);
    }
}
