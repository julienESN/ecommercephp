<?php
require_once './controllers/UserController.php';

$userController = new UserController();
$userController->checkDatabaseConnection();
?>


/* <?php
session_start();
var_dump($_SESSION);
?> */