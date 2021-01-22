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

    public function store($data)
    {
        $this->pharmacy = $this->pharmacy->create($data);
        $this->pharmacy->images()->createMany($data['images']);
    }

    public function update($data, $pharmacy)
    {
        $pharmacy->update($data);
        if (!empty($data['images'])) {
            $pharmacy->images()->delete();
            $pharmacy->images()->createMany($data['images']);
        }
    }

    public function destroy($pharmacy)
    {
        $pharmacy->images()->delete();
        $pharmacy->delete();
    }
}