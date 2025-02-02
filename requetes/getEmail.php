<?php header('Content-Type: text/html; charset=utf-8');
require "../include/connectDB.php";

//verifie si la requête est bien de l'ajax.
function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

if(isAjax()){

    // Préparation de la requête
    $requete=$db->prepare("select emailClient from client where emailClient = :email");
    $requete->bindParam(':email', $_GET['email'],PDO::PARAM_STR,50);
    $requete->execute();

    $result = $requete->fetchAll(PDO::FETCH_ASSOC);

    $result = utf8_encode(json_encode($result));

    // Affichage sur la page.php
    echo $result;

}else {
    echo "access denied";
}

?>