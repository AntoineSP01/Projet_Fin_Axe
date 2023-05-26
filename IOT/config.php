<?php
require 'ConnexiontoBDD.php';
try {
    $conn->exec("SET NAMES utf8mb4;");
    $conn->exec("CREATE TABLE IF NOT EXISTS tweet (id INTEGER PRIMARY KEY, content TEXT NOT NULL, cat TEXT NOT NULL);");
} catch(PDOException $e) {
    die("Erreur lors de la création de la table : " . $e->getMessage());
}

?>