<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResourse;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    private $countryService;

    public function __construct(CountryService $countryService) {
        $this->countryService = $countryService;
    }

    public function all()
    {
        $countries = $this->countryService->all();
        return CountryResourse::collection($countries);
    }
}
