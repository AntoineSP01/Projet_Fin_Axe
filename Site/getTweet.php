<?php

require 'config.php';

$query = $conn->query("SELECT * FROM tweet ORDER BY tweet_date DESC LIMIT 1;");
$tweet = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($tweet);
?>