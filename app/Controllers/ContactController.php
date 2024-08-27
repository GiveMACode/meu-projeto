<?php

namespace App\Controllers;

use App\Models\Contact;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ContactController {
    private $key = 'secret_key'; // Substitua por uma chave segura

    public function createContact() {
        $headers = getallheaders();
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        try {
            JWT::decode($token, new Key($this->key, 'HS256'));
        } catch (\Exception $e) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }

        $data = json_decode(file_get_contents("php://input"));
        $contactModel = new Contact();
        $contactModel->create($data->user_id, $data->name, $data->email);
        echo json_encode(['message' => 'Contact created']);
    }

    public function getContacts() {
        $contactModel = new Contact();
        $contacts = $contactModel->getAll();
        echo json_encode($contacts);
    }
}
