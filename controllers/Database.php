<?php

class Database {
    private $host = "localhost";
    private $db_name = "ecommerce";
    private $username = "root";
    private $password = "root";
    private $port = 3306; // Add the port number here
    private $conn;

    public function connect() {
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }

    
}

?>
