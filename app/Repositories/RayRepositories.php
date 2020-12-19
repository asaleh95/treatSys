<?php

namespace App\Repositories;
use App\Models\Ray;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class RayRepositories
{
    public $ray;

    public function __construct(Ray $ray) {
        $this->ray = $ray;
    }

    public function all($data)
    {        
        return $this->ray->when(!empty($data['name']), function ($query) use($data){
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
        $this->ray = $this->ray->create($data);
    }

    public function saveAvatar($link)
    {
        $this->ray->image()->create(['image' => $link]);
    }

    public function updateAvatar($link, $ray)
    {
        $ray->image()->update(['image' => $link]);
    }

    public function update($data, $ray)
    {
        $ray->update($data);
    }

    public function destroy($ray)
    {
        $ray->image()->delete();
        $ray->delete();
    }
}