<?php

namespace App\Services;

use App\Repositories\RayRepositories;
use App\Traits\FileTrait;

class RayService
{

    use FileTrait;

    private $rayRepositories;

    public function __construct(RayRepositories $rayRepositories)
    {
        $this->rayRepositories = $rayRepositories;
    }

    public function all($data)
    {
        return $this->rayRepositories->all($data);
    }

    public function store($data)
    {
        $this->pharmacyRepositories->store($data);
        $this->uploadAvatar($data['image'], $data['phone']);
    }

    public function uploadAvatar($image, $phone)
    {
        if (!empty($image)) {
            $link = $this->uploadFile($image, "rays/". $phone. '.png');
            $this->saveAvatar($link);
        }
    }

    public function updateAvatar($image, $phone, $ray)
    {
        if (!empty($image)) {
            $link = "rays/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $ray);
        }
    }

    public function saveAvatar($link)
    {
        $this->rayRepositories->saveAvatar($link);
    }

    public function editAvatar($link, $ray)
    {
        $this->rayRepositories->updateAvatar($link, $ray);
    }

    public function destroy($ray)
    {
        $this->rayRepositories->destroy($ray);
    }

    public function update($data, $ray)
    {
        $this->rayRepositories->update($data, $ray);
        $this->updateAvatar($data['image'], $data['phone'], $ray);
    }
}
