<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use App\Traits\HasAuthentication;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepositories;
use Exception;

use function PHPUnit\Framework\throwException;

class AuthService
{

    use HasAuthentication;    

    public function login($data, $auth, $authRepo) // login in service
    {
        $token = $this->tokenRequest($auth, $data, $authRepo->getProvider());
        if ($token['statusCode'] == Response::HTTP_OK) {
            $result['user'] = $authRepo->getModel($data['email']);
            $result['token'] = $token['response'];
            return $result;
        }
    }
}