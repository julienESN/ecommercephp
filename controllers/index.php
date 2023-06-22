<?php
// index.php

require_once 'Database.php';
require_once 'UserController.php';
require_once 'Router.php';

$router = new Router();
$router->handleRequest();


?>