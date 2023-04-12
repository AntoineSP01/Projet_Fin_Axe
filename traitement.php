<?php
session_start();
require_once 'infousers.php';

if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}

$dsn = "mysql:host=localhost;dbname=twitterlike;charset=utf8mb4";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    if (empty($_POST['contenu'])) {
        $contenu_error = "Veuillez remplir le champ 'Votre message'";
        echo $contenu_error;
    } else {
        $nom = $user['users_nom'];
        $contenu = $_POST['contenu'];
        $date = date('Y-m-d H:i:s'); // Récupération de la date et de l'heure actuelles

        // Insertion des données dans la base de données
        $sql = "INSERT INTO tweet (tweet_nom, tweet_contenu, tweet_date) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $contenu, $date]);

        header("Location: affichagetweet.php");
        exit();
    }
}
?>
