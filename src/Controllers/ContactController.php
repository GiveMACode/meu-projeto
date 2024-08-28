<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Core\JWTHandler;

class ContactController
{
    private $contactModel;
    private $jwtHandler;

    public function __construct()
    {
        $this->contactModel = new Contact();
        $this->jwtHandler = new JWTHandler();
    }

    // Listar todos os contatos
    public function index()
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Exemplo para obter o token do cabeçalho

        if (!$this->jwtHandler->validateToken($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $contacts = $this->contactModel->all();
        echo json_encode($contacts);
    }

    // Mostrar um contato específico
    public function show($id)
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Exemplo para obter o token do cabeçalho

        if (!$this->jwtHandler->validateToken($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $contact = $this->contactModel->find($id);
        if ($contact) {
            echo json_encode($contact);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Contact not found']);
        }
    }

    // Criar um novo contato
    public function create()
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Exemplo para obter o token do cabeçalho

        if (!$this->jwtHandler->validateToken($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name']) && isset($data['email'])) {
            $this->contactModel->create($data['name'], $data['email']);
            echo json_encode(['success' => true]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    // Atualizar um contato existente
    public function update($id)
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Exemplo para obter o token do cabeçalho

        if (!$this->jwtHandler->validateToken($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name']) || isset($data['email'])) {
            $this->contactModel->update($id, $data);
            echo json_encode(['success' => true]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    // Deletar um contato
    public function delete($id)
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Exemplo para obter o token do cabeçalho

        if (!$this->jwtHandler->validateToken($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $this->contactModel->delete($id);
        echo json_encode(['success' => true]);
    }
}
