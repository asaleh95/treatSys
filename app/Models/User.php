<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    protected $with = ['image'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imagable');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function findForPassport($username)
    {
        return $this->where('email', $username)
            ->orWhere('phone', $username)->first();
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'favourites');
    }
}
