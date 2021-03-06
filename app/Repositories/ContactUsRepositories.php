<?php

namespace App\Repositories;

use App\Models\ContactUs;

class ContactUsRepositories
{
    public $contactUs;

    public function __construct(ContactUs $contactUs) {
        $this->contactUs = $contactUs;
    }

    public function store($data)
    {
        $this->contactUs->create($data);
    }

    public function all()
    {
       return $this->contactUs->all();
    }

    public function delete($contactus)
    {
        $contactus->delete();
    }
}