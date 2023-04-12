<?php
require 'afficher_date_relative';
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

// Récupérer le terme de recherche depuis le formulaire
$query = $_GET['recherche'];

// Requête SQL pour rechercher des produits
$sql = "SELECT * FROM tweet WHERE tweet_nom LIKE :query OR tweet_contenu LIKE :query";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();

$tweets_html = "";
  
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        $nom_utilisateur = $row["tweet_nom"];
        $contenu = $row["tweet_contenu"];
        $date_creation = $row["tweet_date"];
        $date_diff = afficher_date_relative($date_creation);

        // Ajout du tweet à la variable de chaîne de caractères
        $tweets_html .= "<link rel='stylesheet' href='CSS/style.css'>";
        $tweets_html .= "<div class='message messagesuivant'>";
            $tweets_html .= "<div class='entete'>";
                $tweets_html .= "<div><img src='Image/original.jpeg' alt='Photo de profil' class='image-ronde'></div>";
                $tweets_html .= "<div class='nomheure'> <h2>" .$row['tweet_nom']. "</h2> <br>" . $date_diff . "</div>";
                $tweets_html .= "<div class='suivre'> <img src='Image/Logo_plus.png' alt='logo plus'> <p>suivre</p></div>";
                $tweets_html .= "<hr>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='texte'>";
                $tweets_html .= "<p>" .$row['tweet_contenu']. "</p>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='logo'>";
                $tweets_html .= "<a href='supprimer_tweet.php?tweet_id=" . $row['tweet_id'] . "'><img src='Image/Logo_dustbin.png' id='dustbin' alt='logo de partage'></a>";
                $tweets_html .= "<img src='Image/Logo_coeur.png' alt='logo de coeur'>";
                $tweets_html .= "<img src='Image/Logo_reponse.png' alt='logo de reponse'>";
                $tweets_html .= "<img src='Image/Logo_partage.png' alt='logo de partage'>";
                $tweets_html .= "</div>";
        $tweets_html .= "</div>";
    
}
echo $tweets_html;

}

// Fermer la connexion à la base de donnée
$conn = null;
?>
