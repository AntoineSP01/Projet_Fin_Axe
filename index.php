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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <title>Document</title>

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
                <div class="row">
                    <div class="col mb-3">
                        <p>
                            <input type="email" class="recherche form-control" name="mail" placeholder="Adresse mail" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="password" placeholder="Mot de passe" name="mot_de_passe" class=" recherche form-control" id="exampleInputPassword1">
                        </p>
                    </div>
                </div>
                    <button type="submit" value="Se connecter" class="recherche confirmer" id="confirmer">Se connecter</button>
                <div>
                    <p class="inscription">S'inscrire</p>
                </div>
            </form>
        </div>
    </div>

    <div class="popupinscription">
        <div class="popup-contentinscription">
            <h2>S'inscrire</h2> 
            <form>
                <div class="row">
                    <div class="col mb-3">
                        <p>
                            <input type="texte" class="form-control recherche" name="nom" placeholder="Nom + Prénom" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="texte" class="form-control recherche" name="pseudo" placeholder="Pseudo" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                </div>
                <div class="mb-3">
                    <p>
                        <input type="email" class="form-control recherche" name="mail" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </p>
                </div>
                <div class="row">
                    <div class="col mb-3"> 
                        <p>
                            <input type="password" class="form-control recherche" name="motdepasse" placeholder="Mot de passe" id="exampleInputPassword1">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="password" class="form-control recherche" name="confmotdepasse" placeholder="Confirmation du mot de passe" id="exampleInputPassword1">
                        </p>
                    </div>
                </div>
                
                
                <button type="submit" value="S'inscrire" class="recherche confirmer" id="confirmer" >S'inscrire</button>
            </form>

            <div>
                <p class="connexion">Se connecter</p>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-3 one"></div>

        <div class="col-6 two">
        <div>
            <form method="POST" action="recherche2.php">
                <input type="text" name="recherche" placeholder="Recherche" class="recherche">
            </form>
        </div>

        <div class="tag">
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

        <div class="reset">Réinitialiser les Tags</div>

        
        <div>
        <?php echo $tweets_html; ?>
        </div>
               <br><br><br>
    </div>
        
        

        <div class="col-3 three">
            <div class="fixed">
                <div>
                    <img src="Image/logo-social.png" alt="logo" class="image-ronde" id="logo">
                </div>
                <div>
                    <a href="connecter.php"><button class="menu"><p>Explorer</p></button></a>
                </div>
                <div>
                    <button class="menu"><p>Paramètre</p></button>
                </div>
            </div>
            
        
        
    </div>
    </div>
    <script src="JS/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>