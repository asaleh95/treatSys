<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Support\Facades\Storage;

class Ray extends Model
{
    use HasFactory, SpatialTrait, SoftDeletes;

    protected $with = ['images','workingHours','vacations'];

    protected $fillable = [
        'name','email','phone','discount','region','address','distance','rate','number_of_raters',
        'number_of_views','about','logo','location'
    ];

    protected $spatialFields = [
        'location'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function getLogoAttribute($value)
    {
        if (substr($value, 0, 4) == 'http') {
            return $value;
        }
        return asset(Storage::url($value));
    }

    public function workingHours()
    {
        return $this->morphMany(WorkingHour::class, 'workable');
    }

    public function vacations()
    {
        return $this->morphMany(Vacation::class, 'vacationable');
    }
}
