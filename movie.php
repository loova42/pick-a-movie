<?php
include("include/header.php");
include("include/nav.php");
require "include/connectDB.php";


$requete = $db->prepare("SELECT * FROM movie WHERE idMovie = :id");
$requete->bindParam('id', $_GET['id'], PDO::PARAM_INT);
$requete->execute();

$movie = $requete->fetchObject();

?>

<!-- Page Content -->
<div id="containerMovie" class="container">

    <div class="row">

        <div class="col-lg-15">

            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                <div class="card-body">
                    <h3 class="card-title"><strong>
                            <?= $movie->titleMovie; ?>
                        </strong></h3>
                    <h4>Réalisateur</h4>
                    <p class="card-text">
                        <?= $movie->summaryMovie ?>
                    </p>
                    <!--<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars!-->
                    <select class="browser-default custom-select" style="margin-top:3px;max-width: 200px;">
                        <option selected="">Choisir une date</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <select class="browser-default custom-select" style="margin-top:3px;max-width: 200px;">
                        <option selected="">Choisir séance</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <button type="button" class="btn btn-primary"
                        style="margin-top:3px;max-width: 100px;">Réserver</button>
                </div>


            </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Product Reviews
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                    similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                    Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                    similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                    Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore,
                    similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum.
                    Sequi mollitia, necessitatibus quae sint natus.</p>
                <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                <hr>
                <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

</div>
<?php include "modalConnect.php";?>
<?php include "include/footer.php"; ?>
<script>
    //change l'apparence de la barre de naviagation quand on scroll sur la page
    $(function () {
        $(document).scroll(function () {
            var $nav = $(".navbar");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
</script>
</body>

</html>