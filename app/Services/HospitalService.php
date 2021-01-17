<?php

namespace App\Services;

use App\Repositories\HospitalRepositories;
use App\Traits\FileTrait;
use Illuminate\Support\Str;

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
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->hospitalRepo->store($data);
    }

    public function update($data, $hospital)
    {
        $data['logo'] = $this->uploadLogo($data['logo'], $data['phone']);
        if (empty($data['logo'])) {
            unset($data['logo']);
        }
        $data['images'] = $this->uploadImages($data['images'], $data['phone']);
        $this->hospitalRepo->update($data, $hospital);
    }

    public function uploadLogo($image, $phone)
    {
        if (!empty($image)) {
            $link = "hospitals/". $phone.'/'.Str::random(10). '.png';
            $this->uploadFile($image, $link);
            return $link;
        }
    }

    public function uploadImages($images, $phone)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $link = "hospitals/". $phone.'/'.Str::random(10). '.png';
                $this->uploadFile($image, $link);
                $links[]['image'] = $link;
            }
            return $links;
        }
    }

    public function destroy($hospital)
    {
        $this->hospitalRepo->destroy($hospital);
    }
}
