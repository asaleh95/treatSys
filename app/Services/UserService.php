<?php

namespace App\Services;

use App\Repositories\UserRepositories;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use App\Repositories\AdminRepositories;
use App\Repositories\ServiceProviderRepositories;
use App\Repositories\WorkingHoursRepositories;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\HasAuthentication;
use Kreait\Firebase\DynamicLinks;
use Kreait\Firebase\DynamicLink\CreateDynamicLink\FailedToCreateDynamicLink;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class UserService
{

    use HasAuthentication;
    use FileTrait;
    private $userRepo;

    public function __construct(UserRepositories $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function store($data)
    {
        $this->userRepo->store($data);
        if (!empty($data['photo'])) {
            $link['image'] = $this->uploadFile($data['photo'], "users");
            $this->userRepo->saveImage($link);
        }
    }

    public function all()
    {
        return $this->userRepo->all();
    }

    public function delete($user)
    {
        $this->userRepo->delete($user);
    }

    public function update($data, $user)
    {
        $this->userRepo->update($data, $user);
        $this->updateAvatar($data['image'], $data['phone'], $user);
    }

    public function updateAvatar($image, $phone, $user)
    {
        if (!empty($image)) {
            $link = "users/". $phone. '.png';
            $this->uploadFile($image, $link);
            $this->editAvatar($link, $user);
        }
    }

    public function editAvatar($link, $user)
    {
        $this->userRepo->updateAvatar($link, $user);
    }

    public function forgetPassword($data, $auth)
    {
        $user = $this->userRepo->getBy('email', $data['email']);
        if ($user) {
            $token = $this->userRepo->saveRememberToken($user);
            Mail::to($user)->send(new ForgetPassword($token));
            return;
        }
        return abort(response()->json(["error" => ["Email Not Found"]], 422));
    }

    public function resetPassword($data)
    {
        $this->userRepo->resetPassword($data);
    }

    public function logout()
    {
        $this->userRepo->logout();
    }

    public function likeHospital($data)
    {
        $this->userRepo->likeHospital($data);
    }

    public function likeRay($data)
    {
        $this->userRepo->likeRay($data);
    }

    public function likeLab($data)
    {
        $this->userRepo->likeLab($data);
    }

    public function likePharmacy($data)
    {
        $this->userRepo->likePharmacy($data);
    }

    public function dislikeHospital($data)
    {
        $this->userRepo->dislikeHospital($data);
    }

    public function dislikeRay($data)
    {
        $this->userRepo->dislikeRay($data);
    }

    public function dislikeLab($data)
    {
        $this->userRepo->dislikeLab($data);
    }

    public function dislikePharmacy($data)
    {
        $this->userRepo->dislikePharmacy($data);
    }

    public function destroy($user)
    {
        $this->userRepo->destroy($user);
    }
}
