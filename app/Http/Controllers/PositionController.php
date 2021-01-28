<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Services\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //
    private $positionService;

    public function __construct(PositionService $positionService) {
        $this->positionService = $positionService;
    }

    public function all()
    {
        $positions = $this->positionService->all();
        return PositionResource::collection($positions);
    }
}
