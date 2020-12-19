<?php

namespace App\Services;

use App\Repositories\LabRepositories;
use App\Traits\FileTrait;

class LabService
{

    use FileTrait;

    private $labRepositories;

    public function __construct(LabRepositories $labRepositories)
    {
        $this->labRepositories = $labRepositories;
    }

    public function all($data)
    {
        return $this->labRepositories->all($data);
    }

    public function store($data)
    {
        $this->labRepositories->store($data);
        $this->uploadAvatar($data['image'], $data['phone']);

    }

    public function uploadAvatar($image, $phone)
    {
        if (!empty($image)) {
            $link = $this->uploadFile($image, "labs/". $phone. '.png');
            $this->saveAvatar($link);
        }
    }

    public function updateAvatar($image, $phone, $lab)
    {
        if (!empty($image)) {
            $link = "labs/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $lab);
        }
    }

    public function saveAvatar($link)
    {
        $this->labRepositories->saveAvatar($link);
    }

    public function editAvatar($link, $lab)
    {
        $this->labRepositories->updateAvatar($link, $lab);
    }

    public function destroy($lab)
    {
        $this->labRepositories->destroy($lab);
    }

    public function update($data, $lab)
    {
        $this->labRepositories->update($data, $lab);
        $this->updateAvatar($data['image'], $data['phone'], $lab);
    }
}
