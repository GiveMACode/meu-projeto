<?php

namespace App\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController {
    private $key = 'secrect_key'; // Substitua por uma chave segura

    public function login() {
        $data = json_decode(file_get_contents("php://input"));
        $userModel = new User();
        $user = $userModel->findByUsername($data->username);

        if ($user && password_verify($data->password, $user['password'])) {
            $token = JWT::encode(['sub' => $user['id']], $this->key, 'HS256');
            echo json_encode(['token' => $token]);
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Invalid credentials']);
        }
    }
}
