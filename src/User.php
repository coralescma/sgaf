<?php
// src/User.php

class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username AND password = :password LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Sin hashing
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Autenticación exitosa
        }
        return false; // Autenticación fallida
    }
}
?>