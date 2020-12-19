<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacyFilterRequest;
use App\Http\Resources\PharmacyResource;
use App\Models\Pharmacy;
use App\Services\PharmacyService;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    //
    private $pharmacyService;

    public function __construct(PharmacyService $pharmacyService) {
        $this->pharmacyService = $pharmacyService;
    }

    public function index(PharmacyFilterRequest $request)
    {
        //
        $rays = $this->pharmacyService->all($request->all());
        return PharmacyResource::collection($rays);
    }

    public function show(Pharmacy $pharmacy)
    {
        //
        return new PharmacyResource($pharmacy);
    }
}
