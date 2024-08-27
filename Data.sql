CREATE DATABASE data;
USE data;

CREATE DATABASE data;
USE data;

CREATE TABLE users (
    id CHAR(36) PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE contacts (
    id CHAR(36) PRIMARY KEY,
    user_id CHAR(36),
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE INDEX idx_email ON contacts(email);
CREATE INDEX idx_phone ON contacts(phone);
SELECT * FROM contacts;

SELECT c.id AS contact_id, c.first_name, c.last_name, c.email AS contact_email, c.phone, 
       u.id AS user_id, u.username, u.email AS user_email
FROM contacts c
JOIN users u ON c.user_id = u.id;
