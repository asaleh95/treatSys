<?php

namespace App\Repositories;
use App\Models\Doctor;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class DoctorRepositories
{
    public $doctor;

    public function __construct(Doctor $doctor) {
        $this->doctor = $doctor;
    }

    public function all($data)
    {      
        $paginate = !empty($data['paginate']) ? $data['paginate'] : 12;
        return $this->doctor->when(!empty($data['name']), function ($query) use($data){
            $query->where('name', 'like', '%'. $data['name'].'%');
        })->when(!empty($data['location']) ,function ($query) use($data){
            $arr = explode(',', $data['location']);
            $query->distance('location', new Point($arr[0], $arr[1]), 10);
        })
        ->when(!empty($data['like']), function ($query) use ($data) {
            $query->whereHas('users', function ($query){
                $query->where('favourites.user_id', auth()->id());
            });
        })
        ->paginate($paginate);
    }

    public function store($data)
    {
        $this->doctor = $this->doctor->create($data);
    }

    public function saveAvatar($link)
    {
        $this->doctor->image()->create(['image' => $link]);
    }

    public function updateAvatar($link, $doctor)
    {
        $doctor->image()->update(['image' => $link]);
    }

    public function update($data, $doctor)
    {
        $doctor->update($data);
    }

    public function destroy($doctor)
    {
        $doctor->image()->delete();
        $doctor->delete();
    }
}