<?php
// index.php

require_once 'Database.php';
require_once 'BaseController.php'; // Nouveau
require_once 'UserController.php';
require_once 'Router.php';
require_once 'Utils.php'; // Nouveau

$router = new Router();
$router->handleRequest();



?>