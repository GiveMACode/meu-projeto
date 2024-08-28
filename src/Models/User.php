<?php

namespace App\Models;

use App\Core\Database;

class User
{
    public function authenticate($username, $password)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute([$username, $password]);
        return $stmt->fetch();
    }
}
