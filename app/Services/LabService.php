<?php

namespace App\Services;

use App\Repositories\LabRepositories;
use App\Traits\FileTrait;
use Illuminate\Support\Str;

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
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->labRepositories->store($data);
    }

    public function destroy($lab)
    {
        $this->labRepositories->destroy($lab);
    }

    public function update($data, $lab)
    {
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        if (empty($data['logo'])) {
            unset($data['logo']);
        }
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->labRepositories->update($data, $lab);
    }

    public function uploadImages($images, $phone)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $link = "labs/". $phone.'/'.Str::random(10). '.png';
                $this->uploadFile($image, $link);
                $links[]['image'] = $link;
            }
            return $links;
        }
    }

    public function uploadLogo($image, $phone)
    {
        if (!empty($image)) {
            $link = "labs/". $phone.'/'.Str::random(10). '.png';
            $this->uploadFile($image, $link);
            return $link;
        }
    }
}
