<?php
// BaseController.php (Nouveau fichier)

class BaseController {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    protected function connect() {
        return $this->db->connect();
    }
}


?>