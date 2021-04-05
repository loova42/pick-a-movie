<?php header('Content-Type: text/html; charset=utf-8');
require "include/connectDB.php";

// Préparation de la requête
$requete=$db->prepare("select * from movie");

$requete->execute();

$result = $requete->fetchAll(PDO::FETCH_ASSOC);

$result = utf8_encode(json_encode($result));

// Affichage sur la page.php
echo $result;

?>