<?php

namespace App\Repositories;
use App\Models\Pharmacy;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class PharmacyRepositories
{
    public $pharmacy;

    public function __construct(Pharmacy $pharmacy) {
        $this->pharmacy = $pharmacy;
    }

    public function all($data)
    {        
        return $this->pharmacy->when(!empty($data['name']), function ($query) use($data){
                $query->where('name', 'like', '%'. $data['name'].'%');
        })
        ->when(!empty($data['location']) ,function ($query) use($data){
            $arr = explode(',', $data['location']);
            $query->distance('location', new Point($arr[0], $arr[1]), 10);
        })
        ->paginate(15);
    }
}