<?php

namespace App\Repositories;
use App\Models\Hospital;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class HospitalRepositories
{
    public $hospital;

    public function __construct(Hospital $hospital) {
        $this->hospital = $hospital;
    }

    public function all($data)
    {
        $paginate = !empty($data['paginate']) ? $data['paginate'] : 12;
        return $this->hospital->when(!empty($data['name']), function ($query) use($data){
                $query->where('name', 'like', '%'. $data['name'].'%');
        })
        ->when(!empty($data['location']) ,function ($query) use($data){
            $arr = explode(',', $data['location']);
            $query->distance('location', new Point($arr[0], $arr[1]), 10);
        })
        ->paginate($paginate);
    }

    public function store($data)
    {
        $this->hospital = $this->hospital->create($data);
    }

    public function saveAvatar($link)
    {
        $this->hospital->image()->create(['image' => $link]);
    }

    public function updateAvatar($link, $hospital)
    {
        $hospital->image()->update(['image' => $link]);
    }

    public function update($data, $hospital)
    {
        $hospital->update($data);
    }

    public function destroy($hospital)
    {
        $hospital->image()->delete();
        $hospital->delete();
    }
}