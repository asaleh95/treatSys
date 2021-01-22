<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Doctor extends Model
{
    use HasFactory, SpatialTrait, SoftDeletes;

    protected $with = ['image','users'];

    protected $fillable = [
        'name','phone','location','address','position','rate','basic_price','treat_price','about'
    ];

    protected $spatialFields = [
        'location'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imagable');
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }

    public function setLocationAttribute($value)
    {
        $arr = explode(',', $value);
        $this->attributes['location'] = new Point($arr[0], $arr[1]);
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'favourites');
    }
    
}
