<?php 
include_once 'affichagetweet.php';
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
     <div class="popup">
        <div class="popup-content">
            <span class="popup-close"></span>
            <h2>Connectez vous pour continuer ou inscrivez vous !</h2>
            <div>
                <a class="popup-buttonconnexion"><p>Se connecter</p></a>
            </div>
            <div>
            <a class="popup-buttoninscription"><p>S'inscrire</p></a>
            </div>
        </div>
    </div>

    <div class="popupconnexion">
        <div class="popup-contentconnexion">
            <h2>Se connecter !</h2>
            <form action="connexion.php" method="post">
                <div>
                    <p>
                        <input type="email" placeholder="Adresse mail" name="mail" class="recherche">
                    </p>
                </div>
                <div>
                    <p>
                        <input type="password" placeholder="Mot de passe" name="mot_de_passe" class="recherche">
                    </p>
                </div>
                <div>
                    <input type="submit" value="Se connecter" class="recherche" id="confirmer">
                </div>
                <div>
                    <p class="inscription">S'inscrire</p>
                </div>
            </form>
        </div>
    </div>

    <div class="popupinscription">
        <div class="popup-contentinscription">
            <h2>S'inscrire</h2>
                
            <form action="inscription.php" method="post">
                <div>
                        <p>
                            <input type="text" name="nom" placeholder="Nom + Prénom" class="recherche">
                        </p>
                    
                </div>
                <div>
                    
                        <p>
                        <input type="email" name="mail" placeholder="Email"  class="recherche">
                        </p>
                    
                    
                        <p>
                            <input type="text" name="pseudo" placeholder="Pseudo" class="recherche">
                        </p>
                </div>
                <div>
                    
                        <p>
                            <input type="password" name="motdepasse" placeholder="Mot de passe" class="recherche">
                        </p>
                    
                </div>
                <div>
                    
                        <p>
                        <input type="password" name="confmotdepasse" placeholder="Confirmation du mot de passe"  class="recherche">
                        </p>
                    
                </div>
            
                <div>
                    <input type="submit" value="S'inscrire" class="recherche" id="confirmer">
                </div>
            </form>
            <div>
                <p class="inscription">S'inscrire</p>
            </div>
        </div>
    </div>

    <div class="wrapper">

        <div class="one"></div>

        <div class="two">
        <div>
            <form methode="GET" action="recherche.php">
                <input type="text" name="recherche" placeholder="Recherche" class="recherche">
            </form>
        </div>
            <div class="tag">
                    <div class="box">Un</div>
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

            
        </div>
        

        <div class="three">
            <div class="fixed">
                <div>
                    <img src="Image/logo-social.png" alt="logo" class="image-ronde" id="logo">
                </div>


                <div class="menu">
                    <p>Explorer</p>
                </div>
                <div class="menu">
                    <p>Paramètre</p>
                </div>
            </div>
            
        
        
    </div>
    </div>
    <script src="JS/script.js"></script>
</body>
</html>