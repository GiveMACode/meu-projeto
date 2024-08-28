<?php

namespace App\Core;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHandler
{
    private $key = 'your_secret_key'; // Substitua pela sua chave secreta

    public function generateToken($username)
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + 3600, // 1 hora
            'username' => $username,
        ];

        return JWT::encode($payload, $this->key, 'HS256');
    }

    public function decodeToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
            return $decoded;
        } catch (\Exception $e) {
            return null; // Token inválido ou expirado
        }
    }

    public function validateToken($token)
    {
        return $this->decodeToken($token) !== null;
    }
}
