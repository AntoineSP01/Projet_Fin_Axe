<?php

require 'afficher_date_relative.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twitterlike";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tweet ORDER BY tweet_date DESC";
    $result = $conn->query($sql);



    $tweets_html = "";
    
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $pseudo = $row["tweet_nom"];
            $id = $row["tweet_id"];
            $contenu = $row["tweet_contenu"];
            $media = $row["tweet_media"];
            $date_creation = $row["tweet_date"];
            $date_diff = afficher_date_relative($date_creation);
            
            $sql = "SELECT users_pdp FROM users WHERE users_pseudo = :pseudo";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['pseudo' => $pseudo]);
            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty($users['users_pdp'])) {
                $media_pdp = $users['users_pdp'];
            } else {
                $media_pdp = 'Media/PhotoProfil/Base.jpg'; // Remplacez par l'image de profil par défaut que vous voulez utiliser
            }


            $tweets_html .= "<div class='message messagesuivant'>";
            $tweets_html .= "<div class='entete'>";
            $tweets_html .= "<div><img src='". $media_pdp ."' alt='Photo de profil' class='image-ronde'></div>";
            $tweets_html .= "<div class='nomheure'> <h2><a href='profil.php?pseudo=" . urlencode($pseudo) . "'>" .$pseudo . "</a></h2> <br><p>" . $date_diff . "</p></div>";
            $tweets_html .= "<div class='suivre'> <img src='Image/Logo_plus.png' alt='logo plus'> <p>suivre</p></div>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='texte'>";
            $tweets_html .= "<p>" .htmlspecialchars($contenu). "</p>";
            if ($media == "") {
                // $tweets_html .= "<div class='container_media'> <img class='media' src='".$media ."'> </div>";
                
            } else {
                $tweets_html .= "<br><div class='container_media'> <img class='media' src='".$media ."'> </div>"; 
            }
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='logo'>";
            $tweets_html .= "<img src='Image/Logo_coeur.png' alt='logo de coeur'>";
            $tweets_html .= "<img src='Image/Logo_reponse.png' alt='logo de reponse'>";
            $tweets_html .= "<img src='Image/Logo_partage.png' alt='logo de partage'>";
            $tweets_html .= "</div>";
            $tweets_html .= "</div>";
        }
    }
 } catch(PDOException $e) {
     die("Erreur de connexion à la base de données : " . $e->getMessage());
 }

$conn = null;

?>
<img src="../Media/Tweet/a.png" alt="" >