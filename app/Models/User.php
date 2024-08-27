<?php

namespace App\Models;

use App\Core\Database;

class User {
    private $db;
    private $table = 'users';

    public function __construct() {
        $this->db = new Database();
    }

    public function create($username, $password) {
        $query = "INSERT INTO " . $this->table . " (username, password) VALUES (:username, :password)";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':username', $username);
    
        // Atribuir o hash a uma variável
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
    
        return $stmt->execute();
    }
    
    

    public function findByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch();
    }
}
