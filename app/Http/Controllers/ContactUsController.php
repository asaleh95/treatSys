<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactUsRequest;
use App\Services\ContactUsService;
use Symfony\Component\HttpFoundation\Response;

class ContactUsController extends Controller
{
    //
    private $contactUsService;

    public function __construct(ContactUsService $contactUsService) {
        $this->contactUsService = $contactUsService;
    }

    public function store(StoreContactUsRequest $request)
    {
        $this->contactUsService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }
}
