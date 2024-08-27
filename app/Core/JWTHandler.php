<?php

namespace App\Core;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHandler {
    private $secret_key;

    public function __construct() {
        $this->secret_key = "seu_secret_key_aqui"; // Coloque uma chave secreta segura aqui
    }

    public function generateToken($data) {
        $payload = [
            'iss' => 'http://localhost',
            'aud' => 'http://localhost',
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
            'data' => $data
        ];

        return JWT::encode($payload, $this->secret_key, 'HS256');
    }

    public function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key($this->secret_key, 'HS256'));
            return (array) $decoded->data;
        } catch (\Exception $e) {
            return null;
        }
    }
}
