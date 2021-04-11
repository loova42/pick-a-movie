<?php
include("include/header.php");
include("include/nav.php");
?>

<!-- Page Content -->
<div id="containerMovie" class="container">

    <div class="row">

        <div class="col-lg-15">

            <div class="card mt-4">
                <div id="image">
                    
                </div>  
                <div class="card-body">
                    <h3 class="card-title">
                        <div id="title">

                        </div>
                    </h3>
                    <div id="realisateur">

                    </div>
                    <div id="resume">

                    </div>
                    
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

    $(document).ready(function() {
        var idMovie = <?= $_GET['id'] ?>;

        $.ajax({
            url:"requetes/getMovieById.php",
            method:"GET",
            data: {idMovie: idMovie},
            dataType:"json",
            success : function(movie){
                $("<strong>" + movie[0].titleMovie + "</strong>").appendTo("#title");
                $("<h4> Réalisé par : " + movie[0].director + "</h4>").appendTo("#realisateur");
                $("<p class='card-text'>" + movie[0].summaryMovie + "</p>").appendTo("#resume");
                $("<img class='card-img-top img-fluid' src='"+ movie[0].poster +"' alt='"+movie[0].titleMovie+"'>").appendTo("#image");
                
                
            }
        });
        
        

    });
    
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