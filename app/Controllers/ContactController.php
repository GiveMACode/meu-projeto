<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Core\JWTHandler;

class ContactController {
    private $contactModel;
    private $jwt;

    public function __construct() {
        $this->contactModel = new Contact();
        $this->jwt = new JWTHandler();
    }

    public function createContact() {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
            $decoded = $this->jwt->validateToken($token);

            if ($decoded) {
                $user_id = $decoded['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                if ($this->contactModel->create($user_id, $name, $email)) {
                    http_response_code(201);
                    echo json_encode(['message' => 'Contact created']);
                } else {
                    http_response_code(500);
                    echo json_encode(['message' => 'Failed to create contact']);
                }
            } else {
                http_response_code(401);
                echo json_encode(['message' => 'Unauthorized']);
            }
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
        }
    }

    public function getContacts() {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
            $decoded = $this->jwt->validateToken($token);

            if ($decoded) {
                $contacts = $this->contactModel->getAll();
                echo json_encode($contacts);
            } else {
                http_response_code(401);
                echo json_encode(['message' => 'Unauthorized']);
            }
        } else {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
        }
    }
}
