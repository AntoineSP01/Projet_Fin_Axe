<?php

session_start();

require 'ConnexiontoBDD.php';

// Récupération des données du formulaire d'inscription
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$biographie = "";
$motdepasse = $_POST['motdepasse'];
$confmotdepasse = $_POST['confmotdepasse'];
$pdp = "Media/PhotoProfil/Base.jpg";
$banniere = "Media/Bannière/BaseBanniere.png";

// Vérification de la correspondance des mots de passe
if ($motdepasse !== $confmotdepasse) {
  die("Les mots de passe ne correspondent pas");
}

$sql = "SELECT * FROM users WHERE users_pseudo = :pseudo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':pseudo', $pseudo);
$stmt->execute();

if ($stmt->rowCount() > 0) {
  // Le pseudo est déjà pris, demander à l'utilisateur d'en choisir un autre
  die("Le pseudo choisi est déjà pris. Veuillez choisir un autre pseudo.");
}

// Vérification de l'unicité de l'adresse email dans la base de données
$sql = "SELECT * FROM users WHERE users_mail  = :mail";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':mail', $mail);
$stmt->execute();

if ($stmt->rowCount() > 0) {
  die("L'adresse email est déjà utilisée par un autre utilisateur");
}

// Enregistrement de l'utilisateur dans la base de données
$salt = random_bytes(16);
$salt_hex = bin2hex($salt);
$password_with_salt = $motdepasse . $salt;
$hashed_password = password_hash($password_with_salt, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (users_nom, users_pseudo, users_mail, users_biographie, users_mdp, users_salt, users_pdp, users_bannière) VALUES (:nom, :pseudo, :mail, :biographie, :mdp, :salt, :pdp, :banniere)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':pseudo', $pseudo);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':biographie', $biographie);
$stmt->bindParam(':mdp', $hashed_password);
$stmt->bindParam(':salt', $salt_hex);
$stmt->bindParam(':pdp', $pdp);
$stmt->bindParam(':banniere', $banniere);
$stmt->execute();

$_SESSION['mail'] = $mail;

// Redirection vers la page de connexion
header("Location: ../connecter.php");
exit();

?>
