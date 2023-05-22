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
            
            $tweets_html .= "<div class='message messagesuivant'>";
            $tweets_html .= "<div class='entete'>";
            $tweets_html .= "<div><img src='Image/original.jpeg' alt='Photo de profil' class='image-ronde'></div>";
            $tweets_html .= "<div class='nomheure'> <h2>" .$pseudo . "</h2> <br>" . $date_diff . "</div>";
            $tweets_html .= "<div class='suivre'> <img src='Image/Logo_plus.png' alt='logo plus'> <p>suivre</p></div>";
            $tweets_html .= "<hr>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='texte'>";
            $tweets_html .= "<p>" .htmlspecialchars($contenu). "<br><br><br></p>";
            $tweets_html .= "<div class='container_media'>";
            $tweets_html .= "<img class='media' src='".$media ."'>";
            $tweets_html .= "</div>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='logo'>";
            // $tweets_html .= "<img src='Image/Logo_dustbin.png' id='dustbin' alt='logo de partage' onclick='openpopup(".$id.")' >";
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