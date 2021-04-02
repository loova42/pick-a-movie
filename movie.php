<?php
require "connectDB.php";

//$movie = $db->query("SELECT * FROM movie WHERE idMovie = :id", [(int)"id"=>$_GET['id']])->fetch();

$requete = $db->prepare("SELECT * FROM movie WHERE idMovie = :id");
$requete->bindParam('id', $_GET['id'], PDO::PARAM_INT);
$requete->execute();

$movie = $requete->fetchObject();

?>

<html>

<body>
    <h1><?= $movie->titleMovie ?></h1>
</body>
</html>


