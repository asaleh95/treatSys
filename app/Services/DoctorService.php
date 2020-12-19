<?php

namespace App\Services;

use App\Repositories\DoctorRepositories;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Storage;

class DoctorService
{

    use FileTrait;

    private $doctorRepo;

    public function __construct(DoctorRepositories $doctorRepo)
    {
        $this->doctorRepo = $doctorRepo;
    }

    public function all($data)
    {
        return $this->doctorRepo->all($data);
    }

    public function store($data)
    {
        $this->doctorRepo->store($data);
        $this->uploadAvatar($data['image'], $data['phone']);

    }

    public function uploadAvatar($image, $phone)
    {
        if (!empty($image)) {
            $link = $this->uploadFile($image, "doctors/". $phone. '.png');
            $this->saveAvatar($link);
        }
    }

    public function updateAvatar($image, $phone, $doctor)
    {
        if (!empty($image)) {
            $link = "doctors/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $doctor);
        }
    }

    public function saveAvatar($link)
    {
        $this->doctorRepo->saveAvatar($link);
    }

    public function editAvatar($link, $doctor)
    {
        $this->doctorRepo->updateAvatar($link, $doctor);
    }

    public function destroy($doctor)
    {
        $this->doctorRepo->destroy($doctor);
    }

    public function update($data, $doctor)
    {
        $this->doctorRepo->update($data, $doctor);
        $this->updateAvatar($data['image'], $data['phone'], $doctor);
    }
}
