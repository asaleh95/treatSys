<?php

namespace App\Services;

use App\Repositories\PharmacyRepositories;
use App\Repositories\RayRepositories;
use App\Traits\FileTrait;
use Illuminate\Support\Str;

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
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->pharmacyRepositories->store($data);
    }

    public function update($data, $pharmacy)
    {
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        if (empty($data['logo'])) {
            unset($data['logo']);
        }
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->pharmacyRepositories->update($data, $pharmacy);
    }

    public function uploadLogo($image, $phone)
    {
        if (!empty($image)) {
            $link = "pharmacies/". $phone.'/'.Str::random(10). '.png';
            $this->uploadFile($image, $link);
            return $link;
        }
    }

    public function uploadImages($images, $phone)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $link = "pharmacies/". $phone.'/'.Str::random(10). '.png';
                $this->uploadFile($image, $link);
                $links[]['image'] = $link;
            }
            return $links;
        }
    }

    public function destroy($pharmacy)
    {
        $this->pharmacyRepositories->destroy($pharmacy);
    }
}
