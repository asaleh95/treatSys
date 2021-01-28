<?php

namespace App\Services;

use App\Repositories\CountryRepository;
use App\Repositories\PositionRepository;

class PositionService
{
    private $positionRepository;

    public function __construct(PositionRepository $positionRepository) {
        $this->positionRepository = $positionRepository;
    }

    public function all()
    {
        return $this->positionRepository->all();
    }
}