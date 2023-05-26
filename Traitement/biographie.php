<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: ../index.php');
    exit();
}

require_once 'infousers.php';
require_once 'ConnexiontoBDD.php';

$user = $_SESSION['mail'];

// Vérifier si la biographie a été soumise
if (isset($_POST['biographie'])) {
    $biographie = $_POST['biographie'];

    // Mettre à jour la biographie seulement si elle est différente de la valeur précédente
    if ($biographie !== '') {
        $requete = $conn->prepare("UPDATE users SET users_biographie = :biographie WHERE users_mail = :mail");
        $requete->execute(array(
            "biographie" => $biographie,
            "mail" => $user
        ));
    }
}

// Vérifier si un fichier a été uploadé pour la photo de profil
if (isset($_FILES['media_pdp']['error']) && $_FILES['media_pdp']['error'] == 0 && $_FILES['media_pdp']['size'] > 0) {
    $file_name_pdp = $_FILES['media_pdp']['name'];
    $file_temp_pdp = $_FILES['media_pdp']['tmp_name'];

    if ($_FILES['media_pdp']['size'] > 2 * 1024 * 1024) {
        echo "La photo de profil doit faire moins de 2 Mo";
        exit();
    }

    $destination_pdp = "Media/PhotoProfil/" . $file_name_pdp;
    move_uploaded_file($file_temp_pdp, "../" . $destination_pdp);

    $requete = $conn->prepare("UPDATE users SET users_pdp = :pdp WHERE users_mail = :mail");
    $requete->execute(array(
        "pdp" => $destination_pdp,
        "mail" => $user
    ));
}

// Vérifier si un fichier a été uploadé pour la bannière
if (isset($_FILES['media_bannière']['error']) && $_FILES['media_bannière']['error'] == 0 && $_FILES['media_bannière']['size'] > 0) {
    $file_name_bannière = $_FILES['media_bannière']['name'];
    $file_temp_bannière = $_FILES['media_bannière']['tmp_name'];

    if ($_FILES['media_bannière']['size'] > 2 * 1024 * 1024) {
        echo "La bannière doit faire moins de 2 Mo";
        exit();
    }

    $destination_bannière = "Media/Bannière/" . $file_name_bannière;
    move_uploaded_file($file_temp_bannière, "../" . $destination_bannière);

    $requete = $conn->prepare("UPDATE users SET users_bannière = :banniere WHERE users_mail = :mail");
    $requete->execute(array(
        "banniere" => $destination_bannière,
        "mail" => $user
    ));
}

$conn = null;
header("Location: ../profil.php");
?>
