<?php
require_once 'ConnexiontoBDD.php';
require_once 'affichagetweet.php';
require_once 'connecter2.php';

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
            <form action="traitement.php" method="post" enctype="multipart/form-data">
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
                    <input type="file" name="media" accept=".jpg, .gif, .png">
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
            <h1>Bienvenue <?php echo $user['users_pseudo']; ?> !</h1>
            <h4>Vous êtes connecté.</h4>
            <br>
            <button class="menu faireunmessage"><p>Faire un message</p></button>
        </div>
    </div>

    <div class="two">
        <div class="transition">
            <form method="POST" action="recherche2.php">
                <input type="text" name="recherche" placeholder="Recherche" class="recherche">
            </form>
        </div>

        <div class="tag transition">
            <div id="Nature">                
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Nature">
                    <button class="box nature" type="submit">Nature </button>
                </form>
            </div>

            <div id="Divertissement">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Divertissement">
                    <button class="box divertissement" type="submit">Divertissement </button>
                </form>
            </div>

            <div id="Cinéma">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Cinéma">
                    <button class="box cinema" type="submit">Cinéma </button>
                </form>
            </div>

            <div id="Blagues">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Blagues">
                    <button class="box blagues" type="submit">Blagues </button>
                </form>
            </div>
            
            <div id="Politique">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Politique">
                    <button class="box politique" type="submit">Politique </button>
                </form>
            </div>

            <div id="Technologie">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Technologie">
                    <button class="box technologie" type="submit">Technologie </button>
                </form>
            </div>

            <div id="Culture">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Culture">
                    <button class="box culture" type="submit">Culture </button>
                </form>
            </div>

            <div id="Gaming">            
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Gaming">
                    <button class="box gaming" type="submit">Gaming </button>
                </form>
            </div>

            <div id="Conseil">
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Conseil">
                    <button class="box conseil" type="submit">Conseil </button>
                </form>
            </div>

            <div id="Autre">
                <form action="tag.php" method="POST"> 
                    <input type="hidden" name="tag" value="Autre">
                    <button class="box autre" type="submit">Autre </button>
                </form>
            </div>

        </div>

        <a href="Connecter.php"> <div class="reset">Réinitialiser les Tags </div></a>

        
        <div class="transition_inverse">
        <?php echo $tweets_html; ?>
        </div>
               <br><br><br>
    </div>
        

    <div class="three">
        <div class="fixed">
            <div>
                <a href="index.html"><img src="Image/logo-social.png" alt="logo" class="image-ronde" id="logo"></a>
            </div>

            <div>
                <a href="connecter2.php"><button class="menu"><p>Explorer</p></button></a>
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
<script src="JS/connecter.js"></script>
<script src="JS/localstorage.js"></script>
<script src="JS/supprimer.js"></script>
<script src="JS/deconnexion.js"></script>
<script src="JS/tag.js"></script>
</body>
</html>