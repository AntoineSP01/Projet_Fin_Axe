<?php
session_start();
require_once 'ConnexiontoBDD.php';
require_once 'infousers.php';
require 'afficher_date_relative.php';


if (!isset($_SESSION['mail'])) {
    header('Location: index.php');
    exit();
}
$mail = $_SESSION['mail'];
$sql = "SELECT users_pseudo FROM users WHERE users_mail = :mail";

$stmt = $conn->prepare($sql);
$stmt->execute(['mail' => $mail]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['pseudo'] = $result['users_pseudo'];

$pseudo = $_SESSION['pseudo'];





$sql = "SELECT * FROM tweet WHERE tweet_nom = :user ORDER BY tweet_date DESC";
$result = $conn->prepare($sql);
$result->execute(['user' => $pseudo]);

$tweets_html = "";
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $pseudo = $row["tweet_nom"];
            $id = $row["tweet_id"];
            $contenu = $row["tweet_contenu"];
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

} else {
    $tweets_html .= "<p class='nothing'> Vous n'avez pas encore écrit de tweet ou vous n'en avez pas encore liker</p>";
}

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
    <div class="">
        <div class="popuptweeter">
            <div class="popup-contenttweeter">
                <span class="popup-closetweeter"></span>
                <h2>Ecrire un message !</h2>
                <form action="traitement.php" method="post">
                    <div>
                        <h1 class="pseudotweet"><?php echo $user['users_pseudo']; ?></h1>
                    </div>
                    <div>
                        <p>
                            <textarea type="text" placeholder="Votre message" name="contenu" class="tweet"></textarea>
                        </p>
                    </div>
                    <div id="tag">
                        <label for="choix">Choisissez un Tag :</label>
                        <select id="choix" name="tag">
                            <option value="Nature">Nature</option>
                            <option value="Divertissement">Divertissement</option>
                            <option value="Cinéma">Cinéma</option>
                            <option value="Blagues">Blagues</option>
                            <option value="Politique">Politique</option>
                            <option value="Technologie">Technologie</option>
                            <option value="Culture">Culture</option>
                            <option value="Gaming">Gaming</option>
                            <option value="Conseil">Conseil</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="Publier" class="recherche" id="confirmer">
                    </div>
                </form>
            </div>
        </div>

        <div class="popupmodifier">
            <div class="popup-contentmodifier">
            <h2>Ecriver votre biographie</h2>
                <form action="biographie.php" method="POST">
                    <div>
                        <p>
                            <input type="hidden" name="pseudo" value="<?php echo $user['users_pseudo']; ?>">
                            <textarea type="text" placeholder="Votre biographie" name="biographie" class="tweet"></textarea>
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
                        <button id="exit">non </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="wrapper">

        <div class="one">
            <div class="fixed user">
                <form method="POST" action="recherche2.php">
                    <input type="text" name="recherche" placeholder="Recherche" class="recherche">
                </form>
                <br>
                <button class="menu faireunmessage"><p>Faire un message</p></button>
            </div>
        </div>

        <div class="two">
            <div class="essai">

                <div class="baniere">
                    <img class="jsp" src="Image/happy-new-year-happy-new-year-greeting-card-colorful-fireworks-sparkling-burning-number-beautiful-holiday-web-banner-248472064.jpg" alt="">
                </div>

                <div class="photoprofil">
                    <img src="Image/istockphoto-1038727610-612x612.jpg" alt="" class="photoprofil">
                </div>

                <h1 class="pseudoprofil"><?php echo $user['users_pseudo']; ?></h1>
                <h2 class="nomprofil"><?php echo $user['users_nom']; ?></h2>


                <button class="menu " id="modifierprofil"><p>Modifier le profil</p></button>

                <div class="biographie">
                    <h3>Ma biographie</h3>
                    <p><?php echo $user['users_biographie']; ?></p>
                </div>

                <div class="tweetprofil">
                    <div>
                        <button id="bouton_own" class="mestweets">Mes Tweets</button>
                    </div>
                    <div>
                        <button id="bouton_like" class="mestweets">Mes Tweets liker</button> 
                    </div>
                </div>


                
                <div  class="own">
                    <?php echo $tweets_html; ?>
                </div>

                <div  class="like">
                    <?php echo 'coucou' ?>
                </div>
                    <br><br><br>
            </div>
        </div>
            

        <div class="three">
            <div class="fixed">
                <div>
                    <a href="index.html"><img src="Image/logo-social.png" alt="logo" class="image-ronde" id="logo"></a>
                </div>

                <div>
                    <a href="connecter.php"><button class="menu"><p>Explorer</p></button></a>
                </div>
                <div>
                    <a href="profil.php"> <button class="menu"><p>Mon profil</p></button></a>
                </div>
                <div>
                    <button class="menu"><p>Paramètre</p></button>
                </div>
                <div>
                    <form action="deconnexion.php" method="POST">
                        <button class="menu" type="submit"><p>Déconnexion</p></button>
                    </form>
                </div>
            </div>
        </div>   
        
        

    </div>
</div>
<script src="JS/connecter.js"></script>
<script src="JS/supprimer.js"></script>
<script src="JS/deconnexion.js"></script>
<script src="JS/tag.js"></script>
<script src="JS/modifierprofil.js"></script>
<script src="JS/profil.js"></script>
</body>
</html>