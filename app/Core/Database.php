<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'meu_projeto_db'; // Substitua pelo nome do seu banco de dados
    private $username = 'root'; // Substitua pelo seu usuário do MySQL
    private $password = '1234'; // Substitua pela sua senha do MySQL
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
