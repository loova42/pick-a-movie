<?php
require "include/connectDB.php";


$requete = $db->prepare("SELECT * FROM movie WHERE idMovie = :id");
$requete->bindParam('id', $_GET['id'], PDO::PARAM_INT);
$requete->execute();

$movie = $requete->fetchObject();



?>

<html>
<?php if($movie != null) : ?>
<body>
    <h1><?= $movie->titleMovie ?></h1>
</body>
<?php else : ?>
    <?php echo "error : id does not exist" ?>
<?php endif ;?>
</html>