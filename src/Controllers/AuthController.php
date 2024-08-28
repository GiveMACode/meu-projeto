<?php

namespace App\Controllers;

use App\Core\JWTHandler;
use App\Models\User;

class AuthController
{
    private $jwtHandler;
    private $userModel;

    public function __construct()
    {
        $this->jwtHandler = new JWTHandler();
        $this->userModel = new User();
    }

    public function login($username, $password)
    {
        $user = $this->userModel->authenticate($username, $password);
        if ($user) {
            $token = $this->jwtHandler->generateToken($username);
            return ['token' => $token];
        } else {
            return ['error' => 'Invalid credentials'];
        }
    }
}
