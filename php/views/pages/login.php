<?php
$pageTitle = "Login - SLAV LIMITED.LTD";
// create a login page to allow users to login to the site
$page = "login";

$error_message = get_error();

ob_start();
?>

<link rel="stylesheet" href="css/login.css">
    <h1>Login</h1>
    <form class="form1" action="actions/connexion.php" method="post">
        <label for="email" class="email">Email</label>
        <div class="centerer">
        <input type="email" name="email" id="email" required>
        </div>
        <label for="motDePasse" class="mdp">Mot de passe</label>
        <div class="centerer">
        <input type="password" name="motDePasse" id="motDePasse" required>
        </div>
        <div class="subbtn">
        <input id="btn" type="submit" value="Se connecter">
        </div>
    </form>


<?php

$pageContent = ob_get_clean();

?>


