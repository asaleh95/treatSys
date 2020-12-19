<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalFilterRequest;
use App\Http\Requests\RayFilterRequest;
use App\Http\Requests\StoreRayRequest;
use App\Http\Requests\UpdateRayRequest;
use App\Http\Resources\HospitalResource;
use App\Http\Resources\RayResource;
use App\Models\Hospital;
use App\Models\Ray;
use App\Services\HospitalService;
use App\Services\RayService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RayController extends Controller
{
    //
    private $rayService;

    public function __construct(RayService $rayService) {
        $this->rayService = $rayService;
    }

    public function index(RayFilterRequest $request)
    {
        //
        $rays = $this->rayService->all($request->all());
        return RayResource::collection($rays);
    }

    public function show(Ray $ray)
    {
        //
        return new RayResource($ray);
    }

    public function store(StoreRayRequest $request)
    {
        //
        $this->rayService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateRayRequest $request, Ray $ray)
    {
        //
        $this->rayService->update($request->all(), $ray);
        return response()->json(["message" => "success"]);
    }

    public function destroy(Ray $ray)
    {
        //
        $this->rayService->destroy($ray);
        return response()->json(["message" => "success"]);
    }
}
