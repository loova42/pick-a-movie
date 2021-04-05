<?php
require("connectDB.php");
require_once("Class/Session.php");
require_once("Class/Authentication.php");

// check si la page a été refreshed
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

// Instancie les sessions
$session = Session::getInstance();
$authentication = new Authentication($session);

// authentification
if (!empty($_POST['LoginEmail']) && !empty($_POST['LoginMDP']))
{
    $connexion = $authentication->login($db, $_POST['LoginEmail'],$_POST['LoginMDP']);
}

// déconnexion
if (isset($_POST['btnDeco'])) $authentication->logout("index.php");

?>

<nav class="navbar fixed-top">
    <span class="navbar-brand mb-0 h1">
        <a href=".">
            <img src="assets/logo_large.png">
        </a>
    </span>

    <div class="navbar-header navbar-right pull-right">
        <ul class="nav navbar-nav navbar-right">
            <form method="POST">
                <div class="input-group">
                    <?php if (empty($_SESSION['auth']->nickNameClient)) : ?>
                    <div class="input-group-prepend">
                        <li style="margin-right: 10px;"><a href="register.php"><i class="fas fa-user"></i> S'inscrire</a></li>
                        <li><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i>Connexion</a></li>
                    </div>
                    <span aria-hidden="true">&nbsp;</span>
                    <?php else : ?>
                    <label for="btnDeco" style="color: white; margin-right: 20px; margin-top:5px">Connecté
                        en tant que
                        <strong id="currentPseudo"><?php echo $_SESSION['auth']->nickNameClient;?></strong>
                    </label>
                    <div id="navbarsExampleDefault">
                        <button name="btnDeco" class="btn btn-outline-light" type="submit">Se
                            déconnecter</button>
                    </div>
                    <?php endif ;?>
                </div>
            </form>
        </ul>
    </div>
</nav>
