<?php

namespace App\Controllers;

use App\Core\JWTHandler;
use App\Models\User;

class AuthController {
    public function login() {
        // Obter dados do POST
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Verificar credenciais
        $user = new User();
        $userData = $user->findByUsername($username);

        if ($userData && password_verify($password, $userData['password'])) {
            // Gerar token JWT
            $jwt = new JWTHandler();
            $token = $jwt->generateToken(['id' => $userData['id'], 'username' => $userData['username']]);
            
            echo json_encode(['token' => $token]);
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Login failed']);
        }
    }
}
