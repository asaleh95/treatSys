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

    public function all()
    {
        return $this->contactUsRepo->all();
    }

    public function delete($contactus)
    {
        $this->contactUsRepo->delete($contactus);
    }
}
