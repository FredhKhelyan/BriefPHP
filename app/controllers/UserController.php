<?php
require_once 'app/models/user.php';
session_start();
class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->register($username, $email, $password);
            header("Location: accueil.php?action=login");
        }
        require 'app\views\Inscription.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
            var_dump($user);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header("Location:accueil.php?action=dashboard.php");
                var_dump($user);
            } else {
                $error = "Identifiants invalides.";
            }
        }
        require 'app\views\Connexion.php';
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        echo "Déconnexion réussie.";
    }
}
?>