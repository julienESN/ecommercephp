<?php
define('ROOT_PATH', realpath(dirname(__FILE__)));
require_once ROOT_PATH.'/Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class UserController {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    private function connect() {
        return $this->db->connect();
    }

    public function register() {
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Validation supplémentaire
        if(empty($name)) {
            echo "Veuillez entrer un nom.";
            return;
        }
    
        if(!ctype_alnum($name)) {
            $_SESSION['error'] = "Le nom ne doit contenir que des caractères alphanumériques.";
            header('Location: ../tesdfst.php');
            return;
        }
    
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Veuillez entrer un email valide.";
            return;
        }
    
        if(strlen($password) < 8) {
            echo "Le mot de passe doit comporter au moins 8 caractères.";
            return;
        }
    
        // Connexion à la base de données
        $conn = $this->connect();
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([':name' => $name, ':email' => $email, ':password' => $hashed_password]);
        
        if($result && $stmt->rowCount() > 0) {
            echo "Inscription réussie, vous pouvez maintenant vous connecter.";
        } else {
            echo "Une erreur est survenue, veuillez réessayer.";
        }
    }
    
    
            

    public function login() {
        $email = $_POST['email']; 
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $db = new DataBase();
            $conn = $db->connect();
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                var_dump($_SESSION);  // Ajout de cette ligne
                echo "Vous êtes connecté !";
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } else {
            echo "Veuillez remplir tous les champs correctement.";
        }
    }
}



?>