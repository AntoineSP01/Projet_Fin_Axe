<?php
session_start();
require_once 'infousers.php';

if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}

require 'ConnexiontoBDD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    if (empty($_POST['contenu'])) {
        $contenu_error = "Veuillez remplir le champ 'Votre message'";
        echo $contenu_error;
    } else {
        $nom = $user['users_pseudo'];
        $tag = $_POST['tag'];
        $contenu = $_POST['contenu'];
        $date = date('Y-m-d H:i:s'); // Récupération de la date et de l'heure actuelles

        // Traitement du fichier média
        $file_name = $_FILES['media']['name'];
        $file_temp = $_FILES['media']['tmp_name'];
                
        
        // Vérification de la taille du fichier
        if ($_FILES['media']['size'] > 2 * 1024 * 1024) {
            echo "Le fichier doit faire moins de 2 Mo";
            exit();
        }
        
        // Déplacement du fichier vers un emplacement permanent (dossier de destination)
        $destination = "Media/" . $file_name;
        move_uploaded_file($file_temp, $destination);
        echo $destination;  
        // Insertion des données dans la base de données
        $sql = "INSERT INTO tweet (tweet_nom, tweet_contenu, tweet_tag, tweet_date, tweet_media) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $contenu, $tag, $date, $destination]);

        header("Location: connecter2.php");
        exit();
    }
}
?>
