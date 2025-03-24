<?php
require_once 'config/config.php';
require_once 'app/controllers/UserController.php';

$controller = new UserController($pdo);
$action = $_GET['action'] ?? 'register';

switch ($action) {
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        include 'app/views/dashboard.php';
        break;
    default:
        $controller->register();
        break;
}
?>