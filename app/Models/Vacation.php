<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Vacation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vacationable_type', 'vacationable_id', 'day'
    ];

    public function vacationable()
    {
        return $this->morphTo();
    }

    public function getDayAttribute($value)
    {
        return Carbon::create($value)->locale('en_US')->dayName;
    }
}
