<?php
// init.php

require_once 'Database.php';
require_once 'UserController.php';

$userController = new UserController();

$action = $_GET['action'];

switch ($action) {
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
}
