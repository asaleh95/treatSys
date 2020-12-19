<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacyFilterRequest;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Http\Resources\PharmacyResource;
use App\Models\Pharmacy;
use App\Services\PharmacyService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function store(StorePharmacyRequest $request)
    {
        //
        $this->pharmacyService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        //
        $this->pharmacyService->update($request->all(), $pharmacy);
        return response()->json(["message" => "success"]);
    }

    public function destroy(Pharmacy $pharmacy)
    {
        //
        $this->pharmacyService->destroy($pharmacy);
        return response()->json(["message" => "success"]);
    }
}
