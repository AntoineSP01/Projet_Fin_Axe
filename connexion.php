<?php

session_start();

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

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupération des données du formulaire
  $mail = $_POST['mail'];
  $mot_de_passe = $_POST['mot_de_passe'];
  
  // Vérification que les champs requis sont remplis
  if (empty($mail) || empty($mot_de_passe)) {
    die("Veuillez remplir tous les champs du formulaire");
    
  } else {
    
    // Récupération du salt et du hashed password associé à l'utilisateur depuis la base de données
    $stmt = $conn->prepare("SELECT users_salt, users_mdp FROM users WHERE users_mail = ?");
    $stmt->execute([$mail]);
    $row = $stmt->fetch();
    
    if ($stmt->rowCount() == 1) {
      // Informations d'authentification valides, vérification du mot de passe
      $salt_hex = $row['users_salt'];
      $hashed_password = $row['users_mdp'];
      $salt = hex2bin($salt_hex);
      
      $user_password_with_salt = $mot_de_passe . $salt;
    
      if (password_verify($user_password_with_salt, $hashed_password)) {
        // Le mot de passe est correct, création de la session et redirection vers la page protégée
        $_SESSION['mail'] = $mail;

        header("Location: connecter2.php");
        exit();
      } else {
        // Informations d'authentification invalides, affichage d'un message d'erreur
        die("Adresse mail ou mot de passe incorrect");
      }
    } else {
      die("Informations d'authentification invalides");
    }
       
      
  }
}

exit();
?>
