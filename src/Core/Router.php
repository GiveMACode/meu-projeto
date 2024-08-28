<?php

namespace App\Core;

class Router
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        // Map URLs to controllers
        $routes = [
            'GET' => [
                '/login' => 'AuthController@showLogin',
                '/contacts' => 'ContactController@index'
            ],
            'POST' => [
                '/auth/login' => 'AuthController@login',
                '/contacts' => 'ContactController@store'
            ]
        ];

        if (isset($routes[$method][$url])) {
            list($controller, $action) = explode('@', $routes[$method][$url]);
            $controller = "App\\Controllers\\$controller";
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            http_response_code(404);
            echo 'Not Found';
        }
    }
}
