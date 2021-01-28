<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Doctor;
use App\Models\Position;

class PositionRepository
{
    public $position;

    public function __construct(Position $position) {
        $this->position = $position;
    }

    public function all()
    {      
        return $this->position->all();
    }
}