<?php

namespace App\Repositories;
use App\Models\Lab;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class LabRepositories
{
    public $lab;

    public function __construct(Lab $lab) {
        $this->lab = $lab;
    }

    public function all($data)
    {        
        return $this->lab->when(!empty($data['name']), function ($query) use($data){
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
        $this->lab = $this->lab->create($data);
    }

    public function saveAvatar($link)
    {
        $this->lab->image()->create(['image' => $link]);
    }

    public function updateAvatar($link, $lab)
    {
        $lab->image()->update(['image' => $link]);
    }

    public function update($data, $lab)
    {
        $lab->update($data);
    }

    public function destroy($lab)
    {
        $lab->image()->delete();
        $lab->delete();
    }
}