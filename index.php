<?php 
include "include/header.php";
?>

<?php include "include/nav.php"; ?>
  <main role="main">

    <!--Carousel!-->
    <div id="carouselContainer">
      <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-pause="hover">
        <ol class="carousel-indicators" id="carousel-indicators">

        </ol>
        <div class="carousel-inner" id="moviesCarousel">

        </div>
      </div>
    </div>

    <!--GRID!-->
    <div class="wrapper" id="moviesGrid">

    </div>

  </main>

<?php include "modalConnect.php";?>

  <!--FOOTER!-->
<?php include "include/footer.php"; ?>



<script>

    // Afficher la liste des films
  $(document).ready(function () {
    $.get("/getMovie.php", function () { }, "json")
      .done(
        function (data) {
          var j = 0;
          for (var i in data) {
          // Variables

            var contenu = "";
            // Ajouts
            contenu += "<a href='/movie.php?id=" + data[i].idMovie + "'>"
            + "<img class='img-fluid' src='" + data[i].poster + "' title='" + escapeHtml(data[i].titleMovie) + "'>";

            // Ajout a la div
            $("<div class='col' id='" + data[i].idMovie + "'>" + contenu + "</div>").appendTo("#moviesGrid");
            contenu = "";

            //Remplissage du carousel
            if (data[i].header != null) {

              contenu += "<a href='/movie.php?id=" + data[i].idMovie + "'>"
              + "<img class='img-fluid' src='" + data[i].header + "'>";

              if (j == 0) {

                $("<li data-target='#carouselIndicators' data-slide-to='" + j + "' class='active'>").appendTo("#carousel-indicators");
                $("<div class='carousel-item active'>" + contenu + "</div>").appendTo("#moviesCarousel");

              } else {

                $("<li data-target='#carouselIndicators' data-slide-to='" + j + "'>").appendTo("#carousel-indicators");
                $("<div class='carousel-item'>" + contenu + "</div>").appendTo("#moviesCarousel");

              }
              j++;

            }


          }
        })
      .fail(function (error) {
        alert("error:" + error.responseText);
      })
  })

    //change l'apparence de la barre de naviagation quand on scroll sur la page
  $(function () {
    $(document).scroll(function () {
      var $nav = $(".navbar");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });

  /*function reloadPage() {
    document.location.reload(true);
  }*/

  function escapeHtml(unsafe) {
    return unsafe
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

</script>

