<?php

namespace App\Repositories;

use App\Enums\ProviderType;
use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Admin;

class UserRepositories implements AuthInterface
{
    public $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function store($data)
    {
        $this->user = $this->user->create($data);
    }

    public function saveImage($link)
    {
        $this->user->image()->create($link);
    }

    public function updateAvatar($link, $user)
    {
        $user->image()->updateOrCreate(
            ['imagable_id' => $user->id],
            ['image' => $link]
        );
    }

    public function logout()
    {
        auth()->user()->token()->revoke();
    }

    public function resetPassword($data)
    {
        $user = $this->user->where('email', $data['email'])->first();
        if (!$user) {
            return abort(response()->json(["error" => ["invalid credentials"]]));
        }
        $user->update(['password' => $data['password'], 'remember_token' => null]);
        $user->tokens()->delete();
    }

    public function getModel($username)
    {
        return $this->user->findForPassport($username);
    }

    public function getBy($column, $value)
    {
        return $this->user->where($column, $value)->first();
    }

    public function saveRememberToken($user)
    {
        $token = mt_rand(10000, 99999);
        $user->update(['remember_token' => $token]);
        return $token;
    }

    public function getProvider()
    {
        return ProviderType::USER;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function delete($user)
    {
        $user->image()->delete();
        $user->reservations()->delete();
        $user->delete();
    }

    public function update($data, $user)
    {
        $user->update($data);
    }

    public function likeHospital($data)
    {
        auth()->user()->hospitals()->attach($data['hospital_id']);
    }

    public function likeRay($data)
    {
        auth()->user()->rays()->attach($data['ray_id']);
    }

    public function likeLab($data)
    {
        auth()->user()->labs()->attach($data['lab_id']);
    }

    public function likePharmacy($data)
    {
        auth()->user()->pharmacies()->attach($data['pharmacy_id']);
    }

    public function dislikeHospital($data)
    {
        auth()->user()->hospitals()->detach($data['hospital_id']);
    }

    public function dislikeRay($data)
    {
        auth()->user()->rays()->detach($data['ray_id']);
    }

    public function dislikeLab($data)
    {
        auth()->user()->labs()->detach($data['lab_id']);
    }

    public function dislikePharmacy($data)
    {
        auth()->user()->pharmacies()->detach($data['pharmacy_id']);
    }

    public function destroy($user)
    {
        $user->image()->delete();
        $user->delete();
    }

}