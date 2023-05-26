<?php

require 'ConnexiontoBDD.php';

$id = $_GET['tweet_id'];
$sql = "DELETE FROM tweet WHERE tweet_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    header("Location: ../profil.php");
    exit();
} else {
    echo "Erreur lors de la suppression du tweet.";
}
?>
