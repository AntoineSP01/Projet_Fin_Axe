<?php

$dsn = 'mysql:host=localhost;dbname=twitterlike';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$id = $_GET['tweet_id'];
$sql = "DELETE FROM tweet WHERE tweet_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    header("Location: Connecter2.php");
    exit();
} else {
    echo "Erreur lors de la suppression du tweet.";
}
?>
