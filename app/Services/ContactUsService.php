<?php

namespace App\Services;

use App\Repositories\ContactUsRepositories;

class ContactUsService
{

    private $contactUsRepo;

    public function __construct(ContactUsRepositories $contactUsRepo)
    {
        $this->contactUsRepo = $contactUsRepo;
    }

    public function store($data)
    {
        return $this->contactUsRepo->store($data);
    }
}
