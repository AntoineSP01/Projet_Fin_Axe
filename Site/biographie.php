<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}

require_once 'infousers.php';
require_once 'ConnexiontoBDD.php';

if(isset($_POST['biographie'])) { // on vérifie que le champ "biographie" a été soumis
    $biographie = $_POST['biographie'];
    $user = $_SESSION['mail']; // on récupère l'utilisateur connecté depuis la session
    
    // connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // préparation de la requête SQL
    $requete = $conn->prepare("UPDATE users SET users_biographie = :biographie WHERE users_mail = :mail");
    
    // exécution de la requête avec les paramètres
    $requete->execute(array(
        "biographie" => $biographie,
        "mail" => $user
    ));
    
    // fermeture de la connexion à la base de données
    $conn = null;
    
    // message de confirmation
    header("Location: profil.php");
}
?>
