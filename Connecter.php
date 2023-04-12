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
                <p><a href="Profil.php"> Mon Profil</a></p>
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