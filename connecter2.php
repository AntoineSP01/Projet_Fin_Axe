<?php
session_start();

if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}

// Connexion à la base de données avec PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twitterlike";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

require_once 'infousers.php';
require_once 'Connecter.php';
?>