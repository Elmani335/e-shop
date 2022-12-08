<?php
$pageTitle = "Register - SLAV LIMITED.LTD";

$page = "register";

$error_message = get_error();
ob_start();
?>
<link rel="stylesheet" href="css/register.css">
    <h1>Register</h1>
<form  class="form1" method="post" action="actions/user-interaction.php">
    <label for="pseudo" class="pseudo">Pseudo</label><br>
        <div class="centerer">
            <input class="pseudo" type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-.]{1,20}" title="caractères acceptés : a-zA-Z0-9-." required="required"><br><br>
        </div>
    <label for="mdp" class="mdp">Mot de passe</label><br>
    <div class="centerer">
        <input class="mdp" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required"><br><br>
    </div>
    <div class="centerer">
        <input class="mdpconfirm" type="password" id="mdpconfirm" name="mdpconfirm" placeholder="Confirmation du mot de passe" required="required"><br><br>
    </div>
</form>
    <div class="subbtn">
        <a href="index.php"><input id="btn" type="submit" value= "SUBMIT"></a>
    </div>
<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();
?>