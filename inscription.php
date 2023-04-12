<?php

session_start();

// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=twitterlike";
$username = "root";
$password = "";

try {
  $conn = new PDO($dsn, $username, $password);
  // Activation des exceptions en cas d'erreur
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des données du formulaire d'inscription
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$motdepasse = $_POST['motdepasse'];
$confmotdepasse = $_POST['confmotdepasse'];

// Vérification de la correspondance des mots de passe
if ($motdepasse !== $confmotdepasse) {
  die("Les mots de passe ne correspondent pas");
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
$sql = "INSERT INTO users (users_nom, users_pseudo, users_mail, users_mdp, users_salt) VALUES (:nom, :pseudo, :mail, :mdp, :salt)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':pseudo', $pseudo);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':mdp', $hashed_password);
$stmt->bindParam(':salt', $salt_hex);
$stmt->execute();

$_SESSION['mail'] = $mail;

// Redirection vers la page de connexion
header("Location: connecter2.php");
exit();

?>
