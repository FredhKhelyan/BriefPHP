<?php
session_start();

function checkAccess($requiredRole) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: connexion.php");
        exit();
    }

    if ($_SESSION['role_id'] < $requiredRole) {
        echo "Accès refusé : vous n'avez pas les permissions nécessaires.";
        exit();
    }
}
?>