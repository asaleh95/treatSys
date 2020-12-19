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
}