<?php
session_start();
require_once 'Traitement/ConnexiontoBDD.php';
require_once 'Traitement/infousers.php';
require 'Traitement/afficher_date_relative.php';


if (!isset($_SESSION['mail'])) {
    die("Vous n'etes pas connecter");
    exit();
}
$mail = $_SESSION['mail'];
$sql = "SELECT users_pseudo FROM users WHERE users_mail = :mail";

$stmt = $conn->prepare($sql);
$stmt->execute(['mail' => $mail]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['pseudo'] = $result['users_pseudo'];

// Ici on vérifie si un pseudo est passé dans l'URL, si oui on utilise ce pseudo, sinon on utilise le pseudo de l'utilisateur connecté
if (isset($_GET['pseudo'])) {
    $pseudo = $_GET['pseudo'];
} else {
    $pseudo = $_SESSION['pseudo'];
}

$sql = "SELECT * FROM users WHERE users_pseudo = :pseudo";
$stmt = $conn->prepare($sql);
$stmt->execute(['pseudo' => $pseudo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    die("L'utilisateur n'existe pas.");
}
$media_pdp = $user['users_pdp'];

$sql = "SELECT * FROM tweet WHERE tweet_nom = :user ORDER BY tweet_date DESC";
$result = $conn->prepare($sql);
$result->execute(['user' => $pseudo]);


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
        $tweets_html .= "<div><img src='". $media_pdp ."' alt='Photo de profil' class='image-ronde'></div>";
        $tweets_html .= "<div class='nomheure'> <h2>" .$pseudo . "</h2> <br>" . $date_diff . "</div>";
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
        if ($_SESSION['pseudo'] == $pseudo) {
            $tweets_html .= "<img src='Image/Logo_dustbin.png' id='dustbin' alt='logo de partage' onclick='openpopup(".$id.")' >";
        }
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
    <link rel="icon" href="Image/Logo.jpg">
    <title>Lyfe</title>
    
</head>
<body>
    <div class="popuptweeter">
        <div class="popup-contenttweeter">
            <span class="popup-closetweeter"></span>
            <h2>Ecrire un message !</h2>
            <form action="Traitement/traitement.php" method="post" enctype="multipart/form-data">
                <div>
                    <h1 class="pseudotweet"><?php echo $user['users_pseudo']; ?></h1>
                </div>
                <div>
                    <p>
                        <textarea id="message" type="text" placeholder="Votre message" name="contenu" class="tweet"></textarea>
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
                <div id="media">
                    <h3>Envie d'illustrer vos propos  :   <input type="file" name="media" accept=".jpg, .gif, .png"></h3>
                </div>
                <input type="hidden" name="current_page" value="profil.php">
                <div>
                    <input type="submit" value="Publier" class="recherche" id="confirmer" onclick="publish()">
                </div>
            </form>
            
        </div>
    </div>

    <div class="popupmodifier">
        <div class="popup-contentmodifier">
            <form action="Traitement/biographie.php" method="POST" enctype="multipart/form-data">
                <h2>Ecriver votre biographie</h2>
                <div>
                    <p>
                        <input type="hidden" name="pseudo" value="<?php echo $user['users_pseudo']; ?>">
                        <textarea type="text" placeholder="Votre biographie" name="biographie" class="tweet"></textarea>
                    </p>
                </div>
                <div id="media_pdp">
                    <h2>Changez votre photo de profil  :   <input type="file" name="media_pdp" accept=".jpg, .gif, .png"></h2>
                </div>
                <div id="media_bannière">
                    <h2>Changez votre bannière  :   <input type="file" name="media_bannière" accept=".jpg, .gif, .png"></h2>
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
    
    <nav id="mySidebar">
        <a href="javascript:void(0)" onclick="closeNav()">Close</a>
        <a href="connecter.php"><p>Explorer</p></a>
        <a href="profil.php?pseudo=<?php echo urlencode($_SESSION['pseudo']); ?>"><p>Mon profil</p></a>
        <a href="#">Paramètre</a>
        <form action="Traitement/deconnexion.php" method="POST">
            <button class="deconnexion " type="submit"><p><a>Déconnexion</a> </p></button>
        </form>
    </nav>

    <nav id="Sidebar">
        <div class="fixed user">
            <h1>Bienvenue <?php echo $user['users_pseudo']; ?> !</h1>
            <h4>Vous êtes connecté.</h4>
        </div>
        <br><br><br>
        <a href="javascript:void(0)" onclick="closeNav_480()">Close</a>
        <a href="connecter.php"><p>Explorer</p></a>
        <a href="profil.php?pseudo=<?php echo urlencode($_SESSION['pseudo']); ?>"><p>Mon profil</p></a>
        <a href="parametre.php">Paramètre</a>
        <button class="deconnexion faireunmessage"><p><a >Faire un message</a></p></button>
        <form action="Traitement/deconnexion.php" method="POST">
            <button class="deconnexion " type="submit"><p><a>Déconnexion</a> </p></button>
        </form>
    </nav>

    <div class="wrapper">

        <div class="one">
            <div class="fixed user">
                <form method="GET" action="recherche.php">
                    <input type="text" name="recherche" placeholder="Recherche" class="recherche">
                </form>
                <br>
                <button class="menu faireunmessage popup_tweet"><p>Faire un message</p></button>
            </div>
        </div>

        <div class="two">
        <button id="openbtn_480" class="fixed" onclick="openNav_480()">☰</button>

            <div class="baniere">
                <img class="jsp" src="<?php echo $user['users_bannière']; ?>" alt="">
            </div>

            <div class="photoprofil">
                <img src="<?php echo $user['users_pdp']; ?>" alt="" class="photoprofil">
            </div>

            <h1 class="pseudoprofil"><?php echo $user['users_pseudo']; ?></h1>
            <h2 class="nomprofil"><?php echo $user['users_nom']; ?></h2>


            <button class="menu " id="modifierprofil" <?php if ($pseudo != $_SESSION['pseudo']) echo 'style="display:none;"'; ?>><p>Modifier le profil</p></button>

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
                <p class='nothing'> Cette fonctionnalité est en cours de développement, n'hésitez pas à revenir plus tard</p>
            </div>
                    
            
        </div>
            

        <div class="three">
            <div class="fixed">
                <button id="openbtn" onclick="openNav()">☰</button> 
                <div class="display">
                    <div>
                        <a href="connecter.php"><img src="Image/Logo.jpg" alt="logo" class="image-ronde" id="logo"></a>
                    </div>

                    <div>
                        <a href="connecter.php"><button class="menu"><p>Explorer</p></button></a>
                    </div>
                    <div>
                        <a href="profil.php?pseudo=<?php echo urlencode($_SESSION['pseudo']); ?>"><button class="menu"><p>Mon profil</p></button></a>
                    </div>
                    <div>
                        <button class="menu"><p>Paramètre</p></button>
                    </div>
                    <div>
                        <form action="Traitement/deconnexion.php" method="POST">
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
<script src="JS/Navbar.js"></script>
</body>
</html>