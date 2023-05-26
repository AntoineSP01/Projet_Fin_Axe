<?php 
session_start();
include_once 'Traitement/affichagetweet.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="Image/Logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
    <title>Lyfe</title>
    
</head>
<body>
     <div class="popup">
        <div class="popup-content">
            <span class="popup-close"></span>
            <h2>Connectez-vous pour continuer ou inscrivez-vous !</h2>
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
            <form action="Traitement/connexion.php" method="post">
                <div class="row">
                    <div class="col mb-3">
                        <p>
                            <input type="email" class="recherche2 form-control" name="mail" placeholder="Adresse mail" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="password" placeholder="Mot de passe" name="mot_de_passe" class=" recherche2 form-control" id="exampleInputPassword1">
                        </p>
                    </div>
                </div>
                    <button type="submit" value="Se connecter" class="btn btn-primary recherche2 confirmer" id="confirmer">Se connecter</button>
                <div>
                    <p class="inscription">S'inscrire</p>
                </div>
            </form>
        </div>
    </div>

    <div class="popupinscription">
        <div class="popup-contentinscription">
            <h2>S'inscrire</h2> 
            <form action="Traitement/inscription.php" method="post">
                <div class="row">
                    <div class="col mb-3">
                        <p>
                            <input type="texte" class="form-control recherche2" name="nom" placeholder="Nom + Prénom" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="texte" class="form-control recherche2" name="pseudo" placeholder="Pseudo" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </p>
                    </div>
                </div>
                <div class="mb-3">
                    <p>
                        <input type="email" class="form-control recherche2" name="mail" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </p>
                </div>
                <div class="row">
                    <div class="col mb-3"> 
                        <p>
                            <input type="password" class="form-control recherche2" name="motdepasse" placeholder="Mot de passe" id="exampleInputPassword1">
                        </p>
                    </div>
                    <div class="col mb-3">
                        <p>
                            <input type="password" class="form-control recherche2" name="confmotdepasse" placeholder="Confirmation du mot de passe" id="exampleInputPassword1">
                        </p>
                    </div>
                </div>
                
                
                <button type="submit" value="S'inscrire" class="btn btn-primary recherche2 confirmer" id="confirmer" >S'inscrire</button>
            </form>

            <div>
                <p class="connexion">Se connecter</p>
            </div>
        </div>
    </div>

    <nav id="mySidebar">
        <a href="javascript:void(0)" onclick="closeNav()">Close</a>
        <a href="index.php">Explorer</a>
        <a id="dark-mode-toggle">NightMode</a>
        <button class="deconnexion button_conn_inscr"><a>Connexion/Inscription</a></button>
    </nav>

    <nav id="Sidebar">
        <div class="user">
                <h1>Bienvenue sur Lyfe !</h1>
                <h4>Découvrez, inspirez, trouvez votre place dans notre univers. </h4>
        </div>
        <a href="javascript:void(0)" onclick="closeNav_480()">Close</a>
        <a href="index.php">Explorer</a>
        <a id="dark-mode-toggle1">NightMode</a>
        <button class="deconnexion button_conn_inscr_1"><a>Connexion/Inscription</a></button>
        
    </nav>

    <div class="row">

        <div class="col-0 col-md-2 col-xl-3 one">
            <div class="fixed user">
                <h1>Bienvenue sur Lyfe !</h1>
                <h4>Découvrez, inspirez, trouvez votre place dans notre univers. </h4>
            </div>
        </div>

        <div class="col-12 col-md-8 col-xl-6 two">
            <button id="openbtn_480" class="fixed" onclick="openNav_480()">☰</button>
            <div class="unused-class transition">
                <form method="GET" action="recherche.php">
                    <input type="text" name="recherche" placeholder="Recherche" class="recherche">
                </form>
            </div>

            <div class="unused-class2 transition tag" >
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
    
        <div class="col-0 col-md-2 col-xl-3 three">
            <div class="fixed">
                <button id="openbtn" onclick="openNav()">☰</button> 
                <div class="display">
                    <div>
                        <a href="index.php"><img src="Image/Logo.jpg" alt="logo" class="image-ronde" id="logo"></a>
                    </div>
                    <div>
                        <a href="index.php"><button class="menu">Explorer</button></a>
                    </div>
                    <div>
                        <button id="dark-mode-toggle2" class="menu">Night Mode</button>
                    </div>
                    <div>
                        <button class="menu button_conn_inscr_2">Connexion/Inscription</button>
                    </div>
                </div>        
            </div> 
        </div>
    </div>
    
<script src="JS/script.js"></script>
<script src="JS/Navbar.js"></script>
<script src="JS/night.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>