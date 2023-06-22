<?php
class Database {
    private $conn;
  
    public function __construct($host, $username, $password, $database) {
      $this->conn = new mysqli($host, $username, $password, $database);
  
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    public function executeQuery($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);

        if ($params) {
            $stmt->bind_param(...$params);
        }

        if ($stmt->execute()) {
            return $stmt->get_result();
        } else {
            throw new Exception('Database query failed: ' . $this->conn->error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}  

?>