<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'image', 'imagable_type', 'imagable_id'
    ];

    public function imagable()
    {
        return $this->morphTo();
    }

    public function getImageAttribute($value)
    {
        if (substr($value, 0, 4) == 'http') {
            return $value;
        }
        return asset(Storage::url($value));
    }
}
