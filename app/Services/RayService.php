<?php

namespace App\Services;

use App\Repositories\RayRepositories;
use App\Traits\FileTrait;
use Illuminate\Support\Str;

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
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->rayRepositories->store($data);
    }

    public function uploadLogo($image, $phone)
    {
        if (!empty($image)) {
            $link = "rays/". $phone.'/'.Str::random(10). '.png';
            $this->uploadFile($image, $link);
            return $link;
        }
    }

    public function uploadImages($images, $phone)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $link = "rays/". $phone.'/'.Str::random(10). '.png';
                $this->uploadFile($image, $link);
                $links[]['image'] = $link;
            }
            return $links;
        }
    }

    public function destroy($ray)
    {
        $this->rayRepositories->destroy($ray);
    }

    public function update($data, $hospital)
    {
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        if (empty($data['logo'])) {
            unset($data['logo']);
        }
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->rayRepositories->update($data, $hospital);
    }
}
