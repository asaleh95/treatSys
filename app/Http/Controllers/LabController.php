<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalFilterRequest;
use App\Http\Requests\LabFilterRequest;
use App\Http\Resources\HospitalResource;
use App\Http\Resources\LabResource;
use App\Models\Hospital;
use App\Models\Lab;
use App\Services\HospitalService;
use App\Services\LabService;
use Illuminate\Http\Request;

class LabController extends Controller
{
    //
    private $labService;

    public function __construct(LabService $labService) {
        $this->labService = $labService;
    }

    public function index(LabFilterRequest $request)
    {
        //
        $labs = $this->labService->all($request->all());
        return LabResource::collection($labs);
    }

    public function show(Lab $lab)
    {
        //
        return new LabResource($lab);
    }
}
