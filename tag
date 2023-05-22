<?php
// Connexion à la base de données
require 'init.php';

$sql = "SELECT * FROM tweet ORDER BY tweet_date DESC";
$result = $conn->prepare($sql);
$result->execute();

// Utilisation d'une structure de contrôle de flux switch pour changer la couleur en fonction du tag
while ($donnees = $resultat->fetch())
{
    // Récupération de la colonne "nom" de chaque ligne
    $tag = $donnees['tag'];

    switch ($tag) {
        case 'tag1':
            $color = '#FF0000';
            break;
        case 'tag2':
            $color = '#00FF00';
            break;
        case 'tag3':
            $color = '#0000FF';
            break;
        case 'tag1':
            $color = '#FF0000';
            break;
        case 'tag2':
            $color = '#00FF00';
            break;
        case 'tag3':
            $color = '#0000FF';
            break;
        case 'tag1':
            $color = '#FF0000';
            break;
        case 'tag2':
            $color = '#00FF00';
            break;
        case 'tag3':
            $color = '#0000FF';
            break;
    }
}

// Affichage du résultat avec la couleur correspondante
echo "<div style='background-color:" . $color . "'>Contenu de la div</div>";
?>
