<?php
require("connectDB.php");
require_once("class/Session.php");
require_once("class/Authentication.php");

// check si la page a été refreshed
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

// Instancie la session
$session = Session::getInstance();
$authentication = new Authentication($session);

// authentification
if (!empty($_POST['LoginEmail']) && !empty($_POST['LoginMDP']))
{
    $connexion = $authentication->login($db, $_POST['LoginEmail'],$_POST['LoginMDP']);
}

// déconnexion
if (isset($_POST['btnDeco'])) $authentication->logout($_SERVER['HTTP_REFERER']);


?>

<nav class="navbar fixed-top navbar-dark bg-dark navbar-expand-lg">
  <a class="navbar-brand" href="."><img src="assets/logo_large.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <?php if (empty($_SESSION['auth']->nickNameClient)) : ?>
        <li style="margin-right: 10px;">
            <a href="register.php">
                <i class="fas fa-user"></i>S'inscrire
            </a>
        </li>
        <li>
            <a href="#loginModal" data-toggle="modal" data-target="#loginModal">
                <i class="fas fa-sign-in-alt"></i>Connexion
            </a>
        </li>
         <?php else : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <strong> <?= $_SESSION['auth']->nickNameClient ?> </strong>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <form method='POST'>
                    <button id='btnDeco' name="btnDeco"  class="dropdown-item" type="submit">Déconnexion</button>
                </form>
            </div>
      </li>
      <?php endif ;?>
    </ul>
  </div>
</nav>