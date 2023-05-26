<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'ConnexiontoBDD.php';
// Récupération des informations de l'utilisateur connecté
$user_mail = $_SESSION['mail'];
$stmt = $conn->prepare("SELECT * FROM users WHERE users_mail = :user_mail");
$stmt->bindParam(':user_mail', $user_mail);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("Vous n'êtes pas connecté, veuillez vous connecter ou vous inscrire puis réessayer");
}
?>