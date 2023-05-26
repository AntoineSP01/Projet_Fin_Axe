<?php
// Fonctione pour afficher la date relative en format "il y a x temps".

function afficher_date_relative($date) {
    $now = new DateTime();
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    $diff = $now->diff($date);

    if ($diff->y > 0) {
        return "il y a ".$diff->y." an".($diff->y > 1 ? "s" : "");
    } elseif ($diff->m > 0) {
        return "il y a ".$diff->m." mois";
    } elseif ($diff->d > 0) {
        return "il y a ".$diff->d." jour".($diff->d > 1 ? "s" : "");
    } elseif ($diff->h > 0) {
        return "il y a ".$diff->h." heure".($diff->h > 1 ? "s" : "");
    } elseif ($diff->i > 0) {
        return "il y a ".$diff->i." minute".($diff->i > 1 ? "s" : "");
    } else {
        return "il y a quelques secondes";
    }
}
?>