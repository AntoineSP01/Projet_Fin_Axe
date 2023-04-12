<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}
$user = $_SESSION['mail'];

require_once 'ConnexiontoBDD.php';
require_once 'infousers.php';
require 'afficher_date_relative.php';

// Récupérer le terme de recherche depuis le formulaire
$query = $_POST['recherche'];

// Requête SQL pour rechercher des produits
$sql = "SELECT * FROM tweet WHERE tweet_nom LIKE :query OR tweet_contenu LIKE :query ORDER BY tweet_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();

$tweets_html = "";
  
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nom_utilisateur = $row["tweet_nom"];
            $id = $row["tweet_id"];
            $contenu = $row["tweet_contenu"];
            $date_creation = $row["tweet_date"];
            $date_diff = afficher_date_relative($date_creation);
            
            $tweets_html .= "<div class='message messagesuivant'>";
            $tweets_html .= "<div class='entete'>";
            $tweets_html .= "<div><img src='Image/original.jpeg' alt='Photo de profil' class='image-ronde'></div>";
            $tweets_html .= "<div class='nomheure'> <h2>" .$nom_utilisateur . "</h2> <br>" . $date_diff . "</div>";
            $tweets_html .= "<div class='suivre'> <img src='Image/Logo_plus.png' alt='logo plus'> <p>suivre</p></div>";
            $tweets_html .= "<hr>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='texte'>";
            $tweets_html .= "<p>" .htmlspecialchars($contenu). "</p>";
            $tweets_html .= "</div>";
            $tweets_html .= "<div class='logo'>";
            $tweets_html .= "<img src='Image/Logo_dustbin.png' id='dustbin' alt='logo de partage' onclick='openpopup(".$id.")' >";
            $tweets_html .= "<img src='Image/Logo_coeur.png' alt='logo de coeur'>";
            $tweets_html .= "<img src='Image/Logo_reponse.png' alt='logo de reponse'>";
            $tweets_html .= "<img src='Image/Logo_partage.png' alt='logo de partage'>";
            $tweets_html .= "</div>";
            $tweets_html .= "</div>";
        }

}

// Fermer la connexion à la base de donnée
$conn = null; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
    
</head>
<body>
    <div class="popuptweeter">
        <div class="popup-contenttweeter">
            <span class="popup-closetweeter"></span>
            <h2>Ecrire un message !</h2>
            <form action="traitement.php" method="post">
                <div>
                    <h1><?php echo $user['users_nom']; ?></h1>
                </div>
                <div>
                    <p>
                        <textarea type="text" placeholder="Votre message" name="contenu" class="tweet"></textarea>
                    </p>
                </div>
                <div>
                    <input type="submit" value="Publier" class="recherche" id="confirmer">
                </div>
            </form>
        </div>
    </div>

    <div class="popupsupprimer">
        <div class="popup-contentsupprimer">
            <h2>Souhaitez vous vraiment supprimer ce tweet ?</h2>
            <div class="choixsupprimer">
                <div>
                    <a id="deletebutton"><button>oui</button></a>
                </div>
                <div>
                    <button>non </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper">

    <div class="one">
        <div class="fixed user">
            <h1>Bienvenue <?php echo $user['users_nom']; ?> !</h1>
            <p>Vous êtes connecté.</p>
            <br>
            <button class="menu " id="faireunmessage">Faire un message</button>
        </div>
    </div>

    <div class="two">
        <div>
            <form method="POST" action="recherche2.php">
                <input type="text" name="recherche" placeholder="Recherche" class="recherche">
            </form>
        </div>
        <div class="tag">
                <div class="box" id="myDiv">Un</div>
                <div class="box">Deux</div>
                <div class="box">Trois</div>
                <div class="box">Quatre</div>
                <div class="box">Cinq</div>
                <div class="box">Six</div>
                <div class="box">Sept</div>
                <div class="box">Huit</div>
                <div class="box">Neuf</div>   
                <div class="box">Dix</div>
        </div>

        <div class="box1">Réinitialiser les Tags</div>

        
        <div>
        <?php echo $tweets_html; ?>
        </div>
               <br><br><br>
    </div>
        

    <div class="three">
        <div class="fixed">
            <div>
                <a href="index.html"><img src="Image/logo-social.png" alt="logo" class="image-ronde" id="logo"></a>
            </div>

            <div class="menu">
                <a href="index.php"><p>Explorer</p></a>
            </div>
            <div class="menu">
                <p>Mon Profil</p>
            </div>
            <div class="menu">
                <p>Paramètre</p>
            </div>
            <div class="menu">
                <p>Se déconnecter</p>
            </div>
        </div>
    </div>    
    
    

</div>
<script src="JS/connecter.js"></script>
<script src="JS/supprimer.js"></script>
</body>
</html>