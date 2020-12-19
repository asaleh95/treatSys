<?php

namespace App\Services;

use App\Repositories\RayRepositories;

class RayService
{

    private $rayRepositories;

    public function __construct(RayRepositories $rayRepositories)
    {
        $this->rayRepositories = $rayRepositories;
    }

    public function all($data)
    {
        return $this->rayRepositories->all($data);
    }
}
