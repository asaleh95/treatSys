<?php

namespace App\Repositories;

use App\Models\Hospital;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class HospitalRepositories
{
    public $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
    }

    public function all($data)
    {
        return $this->hospital->when(!empty($data['name']), function ($query) use ($data) {
            $query->where('name', 'like', '%' . $data['name'] . '%');
        })
            ->when(!empty($data['location']), function ($query) use ($data) {
                $arr = explode(',', $data['location']);
                $query->distance('location', new Point($arr[0], $arr[1]), 10);
            })
            ->paginate(15);
    }

    public function store($data)
    {
        $this->hospital = $this->hospital->create($data);
        $this->hospital->images()->createMany($data['images']);
    }

    public function update($data, $hospital)
    {
        $hospital->update($data);
        if (!empty($data['images'])) {
            $hospital->images()->delete();
            $hospital->images()->createMany($data['images']);
        }
    }

    public function destroy($hospital)
    {
        $hospital->images()->delete();
        $hospital->delete();
    }
}
