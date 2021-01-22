<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavouriteRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Psr\Http\Message\ServerRequestInterface;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\TokenResource;
use App\Interfaces\AuthInterface;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LikeDoctorRequest;
use App\Http\Requests\LikeHospitalRequest;
use App\Http\Requests\LikeLabRequest;
use App\Http\Requests\LikePharmacyRequest;
use App\Http\Requests\LikeRayRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ValidateUserCodeRequest;

class UserController extends Controller
{
    //
    private $authService, $userService, $authInterface;

    public function __construct( UserService $userService, AuthService $authService, AuthInterface $authInterface) {
        $this->userService = $userService;
        $this->authService = $authService;
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request, ServerRequestInterface $auth)
    {
        $response = $this->authService->login($request->all(), $auth, $this->authInterface);
        $result['user'] = new UserResource($response['user']);
        $result['token'] = new TokenResource(json_decode($response['token']));
        return $result;
    }

    public function store(SignupRequest $request)
    {
        $this->userService->store($request->all());
        return response()->json(["message" => "success"])
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function forgetPassword(ForgetPasswordRequest $request, ServerRequestInterface $auth)
    {
        $this->userService->forgetPassword($request->all(), $auth);
        return response()->json(["message" => "success"]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->userService->resetPassword($request->all());
        return response()->json(["message" => "success"]);
    }

    public function likeDoctor(LikeDoctorRequest $request)
    {
        $this->userService->likeDoctor($request->all());
        return response()->json(["message" => "success"]);
    }

    public function likeHospital(LikeHospitalRequest $request)
    {
        $this->userService->likeHospital($request->all());
        return response()->json(["message" => "success"]);
    }

    public function likeRay(LikeRayRequest $request)
    {
        $this->userService->likeRay($request->all());
        return response()->json(["message" => "success"]);
    }

    public function likeLab(LikeLabRequest $request)
    {
        $this->userService->likeLab($request->all());
        return response()->json(["message" => "success"]);
    }

    public function likePharmacy(LikePharmacyRequest $request)
    {
        $this->userService->likePharmacy($request->all());
        return response()->json(["message" => "success"]);
    }

    public function dislikeDoctor(LikeDoctorRequest $request)
    {
        $this->userService->dislikeDoctor($request->all());
        return response()->json(["message" => "success"]);
    }

    public function dislikeHospital(LikeHospitalRequest $request)
    {
        $this->userService->dislikeHospital($request->all());
        return response()->json(["message" => "success"]);
    }

    public function dislikeRay(LikeRayRequest $request)
    {
        $this->userService->dislikeRay($request->all());
        return response()->json(["message" => "success"]);
    }

    public function dislikeLab(LikeLabRequest $request)
    {
        $this->userService->dislikeLab($request->all());
        return response()->json(["message" => "success"]);
    }

    public function dislikePharmacy(LikePharmacyRequest $request)
    {
        $this->userService->dislikePharmacy($request->all());
        return response()->json(["message" => "success"]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $this->userService->update($request->all(), $user);
        return response()->json(["message" => "success"]);
    }

    public function logout()
    {
        $this->userService->logout();
        return response()->json(["message" => "success"]);
    }

    public function destroy(User $user)
    {
        //
        $this->userService->destroy($user);
        return response()->json(["message" => "success"]);
    }

    public function code(ValidateUserCodeRequest $request)
    {
        return response()->json(["message" => "success"]);
    }

    public function index()
    {
        $users = $this->userService->all();
        return UserResource::collection($users);
    }
}
