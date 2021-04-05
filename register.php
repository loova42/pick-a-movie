<?php
session_start();
include("include/header.php");

//vérifie si une session est lancée. Si il y a une session de lancée,
//on redirige vers index.php
if(isset($_SESSION['auth']->nickNameClient)){
    header("Location:index.php");
    exit();
}

?>

<section id="homePage">
    <div class="container">
        <div class="col-lg-12">
            
            <h1 style="margin-top: 100px; text-align:center"><a href="index.php"><img src="assets/logo_small_icon_only.png" style="postion:relative;"></img></a><br><br>
            Créez votre compte</h1>
        </div>
    </div>
</section><br>

<div class="container" style="max-width: 500px;">
    <form method="post" action="register.php" id="registerForm">
        <div class="form-group">
            <label for="InscriptionMail">Adresse Email</label>
            <input type="email" class="form-control" id="InscriptionMail" placeholder="" name="email">
            <?php if (!empty($mailExists)) echo "<span style=\"color: red;\">Cette adresse mail est déjà prise</span>" ?>
        </div>

        <div class="form-group">
            <label for="InscriptionPseudo">Pseudonyme</label>
            <input type="text" class="form-control" id="InscriptionPseudo" placeholder="" name="pseudo">
        </div>
        
         <div class="form-group">
            <label for="InscriptionPrenom">Prénom</label>
            <input type="text" class="form-control" id="InscriptionPrenom" placeholder="" name="prenom">
        </div>

        <div class="form-group">
            <label for="InscriptionNom">Nom</label>
            <input type="text" class="form-control" id="InscriptionNom" placeholder="" name="nom">
        </div>

        <div class="form-group">
            <label for="InscriptionMDP">Mot de passe</label>
            <label for="InscriptionMDP" id="strongMDP"></label>
            <input type="password" class="form-control" id="InscriptionMDP"
                placeholder="Doit contenir au moins un chiffre" name="mdp">
            <span id="mdpNoNum" style="display:none; color: red;">Le mot de passe doit contenir au moins un
                chiffre</span>
        </div>

        <div class="form-group">
            <label for="InscriptionMDPverif">Verification du mot de passe</label>
            <input type="password" class="form-control" id="InscriptionMDPverif" placeholder="" name="mdpVerif">
            <span id="mdpUnmatch" style="display:none; color: red;">Les mots de passes ne correspondent pas</span><br>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">S'inscrire</button>
        </div>
    </form>
</div>

<?php include "include/footer.php"; ?>