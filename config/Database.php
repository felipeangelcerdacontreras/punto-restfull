<?php
// config/Database.php

class Database {
    private $host = "localhost";
    private $db_name = "puntoventa"; // Cambia esto por el nombre de tu BD
    private $username = "root";             // Usuario por defecto en XAMPP
    private $password = "";                 // Contraseña por defecto en XAMPP
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Esto permite que PHP lance excepciones si hay errores en el SQL
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Para que las tildes y la 'ñ' funcionen correctamente
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}