<?php
require("include/connectDB.php");
require_once("class/Session.php");
require_once("class/Authentication.php");
include("include/header.php");


$session = Session::getInstance();
$authentication = new Authentication($session);

//vérifie si une session auth est lancée. Si il y a une session de lancée,
//on redirige vers index.php
if($session->get('auth')){
    header("Location:.");
    exit();
}

if(
    !empty($_POST['email']) && 
    !empty($_POST['pseudo']) && 
    !empty($_POST['prenom']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['mdp'])) {


        $requete = $db->prepare("SELECT idClient FROM client WHERE emailClient = :email");
        $requete->bindParam('email', $_POST['email'], PDO::PARAM_STR_CHAR);
        $requete->execute();

        $existingEmail = $requete->fetchObject();

        if ($_POST['mdp'] == $_POST['mdpVerif'] && $existingEmail == null) {

            //hashage du mot de passe
            $hashMdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

            //
            $pseudo = htmlentities($_POST['pseudo']);
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $email = htmlentities($_POST['email']);

            $requete = $db->prepare("INSERT INTO client (nickNameClient,nameClient,firstNameClient,pwdClient,emailClient) VALUES (:pseudo,:nom,:prenom,:mdp,:email)");
            $requete->bindParam(':pseudo',$pseudo);
            $requete->bindParam(':nom',$nom);
            $requete->bindParam(':prenom',$prenom);
            $requete->bindParam(':mdp',$hashMdp);
            $requete->bindParam(':email',$email);

            $requete->execute();

            $connexion = $authentication->login($db, $_POST['email'], $_POST['mdp']);
            header("Location:.");

        }
}

?>

<section id="homePage">
    <div class="container">
        <div class="col-lg-12">

            <h1 style="margin-top: 100px; text-align:center"><a href="."><img src="assets/logo_small_icon_only.png"
                        style="postion:relative;"></img></a><br><br>
                Créez votre compte</h1>
        </div>
    </div>
</section><br>

<div class="container" style="max-width: 500px;">
    <form method="post" action="register.php" id="registerForm">
        <div class="form-group">
            <label for="mail">Adresse Email</label>
            <input type="email" class="form-control" id="InscriptionMail" placeholder="" name="email"
                required="required" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email']);} ?>">
            <?php if (!empty($existingEmail)) echo "<span style=\"color: red;\">Cette adresse mail est déjà prise</span>" ?>
        </div>

        <div class="form-group">
            <label for="pseudo">Pseudonyme</label>
            <input type="text" class="form-control" id="pseudo" placeholder="" name="pseudo" required="required"
                value="<?php if (isset($_POST['pseudo'])){echo htmlentities($_POST['pseudo']);} ?>">
        </div>

        <div class="form-group">
            <label for="^prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" placeholder="" name="prenom" required="required"
                value="<?php if (isset($_POST['prenom'])){echo htmlentities($_POST['prenom']);} ?>">
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="" name="nom" required="required"
                value="<?php if (isset($_POST['nom'])){echo htmlentities($_POST['nom']);} ?>">
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <label for="mdp" id="strongMDP"></label>
            <input type="password" class="form-control" id="mdp" placeholder="Doit contenir au moins un chiffre"
                name="mdp" required="required">
            <span id="mdpNoNum" style="display:none; color: red;">Le mot de passe doit contenir au moins un
                chiffre</span>
        </div>

        <div class="form-group">
            <label for="mdpVerif">Verification du mot de passe</label>
            <input type="password" class="form-control" id="mdpVerif" placeholder="" name="mdpVerif"
                required="required">
            <span id="mdpUnmatch" style="display:none; color: red;">Les mots de passes ne correspondent pas</span><br>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">S'inscrire</button>
        </div>
    </form>
</div>
<script>

    //Verifie si les mots de passes correspondent
    $('#mdpVerif').on('focusout', function () {
        if ($('#mdp').val() != "" && $('#mdpVerif').val() != "") {
            if ($('#mdp').val() != $('#mdpVerif').val()) {
                $('#mdpUnmatch').fadeIn();
                $('#submit').prop("disabled", true);
            } else {
                $('#mdpUnmatch').fadeOut();
                $('#submit').prop("disabled", false);
            }

            var regexNumber = new RegExp("[0-9]");

            if (!regexNumber.test($('#mdp').val())) {
                $('#mdpNoNum').fadeIn();
                $('#submit').prop("disabled", true);
            }
            else {
                $('#mdpNoNum').fadeOut();
                $('#submit').prop("disabled", false);
            }

        }
    });

    //Verifie si le mdp comprend bien un chiffre au moins.
    $('#mdp').on('focusout', function () {
        if ($('#mdp').val() != $('#mdpVerif').val()) {
            $('#mdpUnmatch').fadeIn();
            $('#submit').prop("disabled", true);
        } else {
            $('#mdpUnmatch').fadeOut();
            $('#submit').prop("disabled", false);
        }

        var regexNumber = new RegExp("[0-9]");


        if (!regexNumber.test($('#mdp').val())) {
            $('#mdpNoNum').fadeIn();
            $('#submit').prop("disabled", true);
        }
        else {
            $('#mdpNoNum').fadeOut();
            $('#submit').prop("disabled", false);
        }

    });

    //indique la "puissance" du mot de passe en fonction de sa longueur.
    $('#mdp').on('keyup', function () {
        let mdpLen = $('#mdp').val().length;

        if (mdpLen == 0)
            $('#strongMDP').val();
        else if
            (mdpLen >= 0 && mdpLen < 6) $('#strongMDP').text("- Faible").css("color", "red");
        else if
            (mdpLen >= 6 && mdpLen < 12) $('#strongMDP').text("- Moyen").css("color", "grey");
        else
            $('#strongMDP').text("- Fort").css("color", "green");
    });

</script>
<?php include "include/footer.php"; ?>