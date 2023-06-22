<?php
// Router.php

class Router {
    public function handleRequest() {
        $controllerName = $_GET['controller'] ?? 'DefaultController';
        $action = $_GET['action'] ?? 'index';

        // Assuming controllers are named as 'XxxController'
        $controllerClassName = ucfirst($controllerName) . 'Controller';

        if (!class_exists($controllerClassName)) {
            throw new Exception('Controller not found: ' . $controllerClassName);
        }

        $controller = new $controllerClassName();
        if (!method_exists($controller, $action)) {
            throw new Exception('Method not found: ' . $action);
        }

        $controller->$action();
    }
}
