<?php
$pageTitle = "Login - SLAV LIMITED.LTD";
// create a login page to allow users to login to the site
$page = "login";

$error_message = get_error();

ob_start();
?>


<link rel="stylesheet" href="css/login.css">
    <h1>Login</h1>
    <form class="form1" action="../../actions/user-interaction.php" method="post">
        <label for="pseudo" class="pseudo">Pseudo</label><br>
        <div class="centerer">
            <input class="pseudo" type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-.]{1,20}" title="caractères acceptés : a-zA-Z0-9-." required="required"><br><br>
        </div>
        <label for="motDePasse" class="mdp">Mot de passe</label>
        <div class="centerer">
        <input type="password" name="motDePasse" id="motDePasse" required>
        </div>
        <div class="subbtn">
        <input id="btn" type="submit" value= "<?php
        $pseudo = $_POST['pseudo'];
        $motDePasse = $_POST['motDePasse'];
        login($pseudo, $motDePasse);
        ?>">
        </div>
    </form>


<?php $pageContent = ob_get_clean(); ?>


