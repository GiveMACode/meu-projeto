<?php

use App\Controllers\AuthController;
use App\Controllers\ContactController;

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && $uri === '/auth/login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($method === 'POST' && $uri === '/contacts') {
    $controller = new ContactController();
    $controller->createContact();
} elseif ($method === 'GET' && $uri === '/contacts') {
    $controller = new ContactController();
    $controller->getContacts();
} else {
    http_response_code(404);
    echo 'Not Found';
}
