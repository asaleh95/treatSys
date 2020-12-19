<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalFilterRequest;
use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use App\Services\HospitalService;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //
    private $hospitalService;

    public function __construct(HospitalService $hospitalService) {
        $this->hospitalService = $hospitalService;
    }

    public function index(HospitalFilterRequest $request)
    {
        //
        $hospitals = $this->hospitalService->all($request->all());
        return HospitalResource::collection($hospitals);
    }

    public function show(Hospital $hospital)
    {
        //
        return new HospitalResource($hospital);
    }
}
