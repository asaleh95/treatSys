<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalFilterRequest;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use App\Services\HospitalService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


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

    public function store(StoreHospitalRequest $request)
    {
        //
        $this->hospitalService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        //
        $this->hospitalService->update($request->all(), $hospital);
        return response()->json(["message" => "success"]);
    }

    public function destroy(Hospital $hospital)
    {
        //
        $this->hospitalService->destroy($hospital);
        return response()->json(["message" => "success"]);
    }
}
