<?php
// src/Database.php

class Database {
    private $host = 'localhost';
    //private $db_name = 'uixpcwyz_school_management'; // Cambia esto por el nombre de tu base de datos
    //private $username = 'uixpcwyz_school_management'; // Cambia esto si es necesario
    //private $password = 'Venezuela321654*'; // Cambia esto si es necesario
    private $db_name = 'test'; // Cambia esto por el nombre de tu base de datos
    private $username = 'root'; // Cambia esto si es necesario
    private $password = ''; // Cambia esto si es necesario
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>