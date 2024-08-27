<?php

namespace App\Models;

use App\Core\Database;

class Contact {
    private $db;
    private $table = 'contacts';

    public function __construct() {
        $this->db = new Database();
    }

    public function create($user_id, $name, $email) {
        $query = "INSERT INTO " . $this->table . " (user_id, name, email) VALUES (:user_id, :name, :email)";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }
    
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
