<?php
// Démarre la session
session_start();

// Si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Détruit la session pour déconnecter l'utilisateur
    session_destroy();
}

// Redirige l'utilisateur vers la page d'accueil
header('Location: index.php');
exit();
?>
