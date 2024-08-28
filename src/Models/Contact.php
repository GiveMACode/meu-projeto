<?php

namespace App\Models;

use App\Core\Database;

class Contact
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM contacts');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM contacts WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($name, $email)
    {
        $stmt = $this->db->prepare('INSERT INTO contacts (name, email) VALUES (?, ?)');
        $stmt->execute([$name, $email]);
    }

    public function update($id, $data)
    {
        $query = 'UPDATE contacts SET ';
        $params = [];

        if (isset($data['name'])) {
            $query .= 'name = ?, ';
            $params[] = $data['name'];
        }

        if (isset($data['email'])) {
            $query .= 'email = ?, ';
            $params[] = $data['email'];
        }

        $query = rtrim($query, ', ') . ' WHERE id = ?';
        $params[] = $id;

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM contacts WHERE id = ?');
        $stmt->execute([$id]);
    }
}
