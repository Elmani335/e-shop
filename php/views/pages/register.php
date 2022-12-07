<?php
$pageTitle = "Register - SLAV LIMITED.LTD";

$error_message = get_error();
$page = "register";

ob_start();
?>
<link rel="stylesheet" href="css/register.css">
<form  class="form1" method="post" action="">
    <label for="pseudo" class="pseudo">Pseudo</label><br>
        <div class="centerer">
            <input class="pseudo" type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-.]{1,20}" title="caractères acceptés : a-zA-Z0-9-." required="required"><br><br>
        </div>
    <label for="mdp" class="mdp">Mot de passe</label><br>
    <div class="centerer">
        <input class="mdp" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required"><br><br>
    </div>
    <div class="centerer">
        <input class="mdp" type="password" id="mdp_confirm" name="mdp" placeholder="Confirmation du mot de passe" required="required"><br><br>
    </div>
</form>

<?php
$mdp = $_POST['mdp'];
$mdp_confirm = $_POST['mdp_confirm'];

if ($mdp == $mdp_confirm) {
    header(index.php);
} else {
    header(register.php);
}

// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();
?>