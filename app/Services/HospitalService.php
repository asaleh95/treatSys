<?php

namespace App\Services;

use App\Repositories\HospitalRepositories;
use App\Traits\FileTrait;

class HospitalService
{

    use FileTrait;

    private $hospitalRepo;

    public function __construct(HospitalRepositories $hospitalRepo)
    {
        $this->hospitalRepo = $hospitalRepo;
    }

    public function all($data)
    {
        return $this->hospitalRepo->all($data);
    }

    public function store($data)
    {
        $this->hospitalRepo->store($data);
        $this->uploadAvatar($data['image'], $data['phone']);

    }

    public function uploadAvatar($image, $phone)
    {
        if (!empty($image)) {
            $link = $this->uploadFile($image, "hospitals/". $phone. '.png');
            $this->saveAvatar($link);
        }
    }

    public function updateAvatar($image, $phone, $hospital)
    {
        if (!empty($image)) {
            $link = "hospitals/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $hospital);
        }
    }

    public function saveAvatar($link)
    {
        $this->hospitalRepo->saveAvatar($link);
    }

    public function editAvatar($link, $hospital)
    {
        $this->hospitalRepo->updateAvatar($link, $hospital);
    }

    public function destroy($hospital)
    {
        $this->hospitalRepo->destroy($hospital);
    }

    public function update($data, $hospital)
    {
        $this->hospitalRepo->update($data, $hospital);
        $this->updateAvatar($data['image'], $data['phone'], $hospital);
    }
}
