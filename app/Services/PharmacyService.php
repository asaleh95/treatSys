<?php

namespace App\Services;

use App\Repositories\PharmacyRepositories;
use App\Repositories\RayRepositories;
use App\Traits\FileTrait;

class PharmacyService
{

    use FileTrait;

    private $pharmacyRepositories;

    public function __construct(PharmacyRepositories $pharmacyRepositories)
    {
        $this->pharmacyRepositories = $pharmacyRepositories;
    }

    public function all($data)
    {
        return $this->pharmacyRepositories->all($data);
    }

    public function store($data)
    {
        $this->pharmacyRepositories->store($data);
        $this->uploadAvatar($data['image'], $data['phone']);
    }

    public function uploadAvatar($image, $phone)
    {
        if (!empty($image)) {
            $link = $this->uploadFile($image, "pharmacies/". $phone. '.png');
            $this->saveAvatar($link);
        }
    }

    public function updateAvatar($image, $phone, $pharmacy)
    {
        if (!empty($image)) {
            $link = "pharmacies/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $pharmacy);
        }
    }

    public function saveAvatar($link)
    {
        $this->pharmacyRepositories->saveAvatar($link);
    }

    public function editAvatar($link, $pharmacy)
    {
        $this->pharmacyRepositories->updateAvatar($link, $pharmacy);
    }

    public function destroy($pharmacy)
    {
        $this->pharmacyRepositories->destroy($pharmacy);
    }

    public function update($data, $pharmacy)
    {
        $this->pharmacyRepositories->update($data, $pharmacy);
        $this->updateAvatar($data['image'], $data['phone'], $pharmacy);
    }
}
