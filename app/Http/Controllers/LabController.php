<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalFilterRequest;
use App\Http\Requests\LabFilterRequest;
use App\Http\Requests\StoreLabRequest;
use App\Http\Requests\UpdateLabRequest;
use App\Http\Resources\HospitalResource;
use App\Http\Resources\LabResource;
use App\Models\Hospital;
use App\Models\Lab;
use App\Services\HospitalService;
use App\Services\LabService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function store(StoreLabRequest $request)
    {
        //
        $this->labService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateLabRequest $request, Lab $lab)
    {
        //
        $this->labService->update($request->all(), $lab);
        return response()->json(["message" => "success"]);
    }

    public function destroy(Lab $lab)
    {
        //
        $this->labService->destroy($lab);
        return response()->json(["message" => "success"]);
    }
}
