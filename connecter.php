<?php
require_once 'Traitement/ConnexiontoBDD.php';
require_once 'Traitement/infousers.php';

if (isset($_GET['tag'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['mail'])) {
        header('Location: index.php');
        exit();
    }
    // Le paramètre 'tag' est présent dans l'URL
    require 'Traitement/afficher_date_relative.php';
   

    $nomtag = $_GET['tag'];
    $sql = "SELECT * FROM tweet WHERE tweet_tag = :nomtag ORDER BY tweet_date DESC";
    $result = $conn->prepare($sql);
    $result->execute(['nomtag' => $nomtag]);


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
                $tweets_html .= "<div class='nomheure'> <h2><a href='profil.php?pseudo=" . urlencode($pseudo) . "'>" .$pseudo . "</a></h2> <br>" . $date_diff . "</div>";
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
        } else {
            $tweets_html .= "<p class='nothing'> Il n'y a pas de résultats correspondant à votre demande</p>";
        }
} else {
    // Le paramètre 'tag' n'est pas présent dans l'URL
    // Afficher tous les tweets
    require_once 'Traitement/affichagetweet.php';

}




?>

<!DOCTYPE html>
<html lang="fr">
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
                        <textarea id="message" placeholder="Votre message" name="contenu" class="tweet"></textarea>
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
    
    <nav id="mySidebar">
        <a href="javascript:void(0)" onclick="closeNav()">Close</a>
        <a href="connecter.php">Explorer</a>
        <a href="profil.php?pseudo=<?php echo urlencode($user['users_pseudo']); ?>">Mon profil</a>
        <a id="dark-mode-toggle">NightMode</a>
        <form action="Traitement/deconnexion.php" method="POST">
            <button class="deconnexion " type="submit"><a>Déconnexion</a></button>
        </form>
    </nav>

    <nav id="Sidebar">
        <div class="fixed user">
            <h1>Bienvenue <?php echo $user['users_pseudo']; ?> !</h1>
            <h4>Vous êtes connecté.</h4>
        </div>
        <br><br><br>
        <a href="javascript:void(0)" onclick="closeNav_480()">Close</a>
        <a href="connecter.php">Explorer</a>
        <a href="profil.php?pseudo=<?php echo urlencode($user['users_pseudo']); ?>">Mon profil</a>
        <a id="dark-mode-toggle1">NightMode</a>
        <button class="deconnexion faireunmessage"><a >Faire un message</a></button>
        <form action="Traitement/deconnexion.php" method="POST">
            <button class="deconnexion " type="submit"><a>Déconnexion</a></button>
        </form>
    </nav>

    <div class="wrapper">

        <div class="one">
            <div class="fixed user animation_gauche">
                <h1>Bienvenue <?php echo $user['users_pseudo']; ?> !</h1>
                <h4>Vous êtes connecté.</h4>
                <br>
                <button class="menu faireunmessage popup_tweet">Faire un message</button>
            </div>
        </div>

        <div class="two">
            <button id="openbtn_480" class="fixed" onclick="openNav_480()">☰</button>
            <div class="unused-class transition">
                <form method="GET" action="recherche.php">
                    <input type="text" name="recherche" placeholder="Recherche" class="recherche">
                </form>
            </div>

            <div class="unused-class2 transition tag">
                <div id="Nature">                
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Nature">
                        <button class="box nature tag-button" data-tag="Nature"  type="submit">Nature </button>
                    </form>
                </div>

                <div id="Divertissement">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Divertissement">
                        <button class="box divertissement tag-button" data-tag="Divertissement" type="submit">Divertissement </button>
                    </form>
                </div>

                <div id="Cinéma">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Cinéma">
                        <button class="box cinema tag-button" data-tag="Cinéma" type="submit">Cinéma </button>
                    </form>
                </div>

                <div id="Blagues">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Blagues">
                        <button class="box blagues tag-button" data-tag="Blagues" type="submit">Blagues </button>
                    </form>
                </div>
                
                <div id="Politique">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Politique">
                        <button class="box politique tag-button" data-tag="Politique" type="submit">Politique </button>
                    </form>
                </div>

                <div id="Technologie">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Technologie">
                        <button class="box technologie tag-button" data-tag="Technologie" type="submit">Technologie </button>
                    </form>
                </div>

                <div id="Culture">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Culture">
                        <button class="box culture tag-button" data-tag="Culture" type="submit">Culture </button>
                    </form>
                </div>

                <div id="Gaming">            
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Gaming">
                        <button class="box gaming tag-button" data-tag="Gaming" type="submit">Gaming </button>
                    </form>
                </div>

                <div id="Conseil">
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Conseil">
                        <button class="box conseil tag-button" data-tag="Conseil" type="submit">Conseil </button>
                    </form>
                </div>

                <div id="Autre">
                    <form action="connecter.php" method="GET"> 
                        <input type="hidden" name="tag" value="Autre">
                        <button class="box autre tag-button" data-tag="Autre" type="submit">Autre </button>
                    </form>
                </div>

            </div>

            <a href="connecter.php"> <div class="reset">Réinitialiser les Tags </div></a>

            
            <div class="unused-class3 transition_inverse">
            <?php echo $tweets_html; ?>
            </div>
                <br><br><br>
        </div>
            

        <div class="three">
            <div class="fixed">
                <button id="openbtn" onclick="openNav()">☰</button> 
                <div class="display">
                    <div>
                        <a href="connecter.php"><img src="Image/Logo.jpg" alt="logo" class="image-ronde" id="logo"></a>
                    </div>

                    <div>
                        <a href="connecter.php"><button class="menu">Explorer</button></a>
                    </div>
                    <div>
                        <button class="menu"><a href="profil.php?pseudo=<?php echo urlencode($user['users_pseudo']); ?>">Mon profil</a></button>
                    </div>
                    <div>
                        <button id="dark-mode-toggle2" class="menu">Night Mode</button>
                    </div>
                    <div>
                        <form action="Traitement/deconnexion.php" method="POST">
                            <button class="menu" type="submit">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script src="JS/connecter.js"></script>
<script src="JS/localstorage.js"></script>
<script src="JS/supprimer.js"></script>
<script src="JS/tag.js"></script>
<script src="JS/Navbar.js"></script>
<script src="JS/night.js"></script>
</body>
</html>