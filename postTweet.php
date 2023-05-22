<?php
require 'config.php';
require 'afficher_date_relative.php';

$tweet_nom = "Antoine";
$tweet_contenu = "Je suis aller me promener dans la nature il n'y a pas longtermps et j'ai vu des petits oiseaux !";
$tweet_tag = 'Nature';
$tweet_date = date('Y-m-d H:i:s');


$result = $conn->prepare("INSERT INTO tweet (tweet_nom, tweet_contenu, tweet_tag, tweet_date) VALUES (?, ?, ?, ?);");
$result->execute([$tweet_nom, $tweet_contenu, $tweet_tag, $tweet_date]);

?>