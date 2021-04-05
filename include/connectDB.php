<?php

// Connexion à la bd
	$servername= "localhost";
    $port=3306;
	$username = "root";
	$password = "";
	$dbname = "db_pickamovie";
try
{
	$db = new PDO("mysql:host=".$servername.";port=".$port.";dbname=".$dbname.';charset=utf8', $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die($e->getMessage());
}

?>