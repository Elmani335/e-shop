<?php
$pageTitle = "Register - SLAV LIMITED.LTD";

$error_message = get_error();

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

    <label for="nom" class="nom">Nom</label><br>
    <div class="centerer">
    <input class="nom" type="text" id="nom" name="nom" placeholder="votre nom"><br><br>
    </div>
    <label for="prenom" class="prenom">Prénom</label><br>
    <div class="centerer">
    <input class="prenom" type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>
    </div>
    <label for="email" class="email">Email</label><br>
    <div class="centerer">
    <input class="email" type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>
    </div>
    <label for="civilite" class="civilite">Civilité</label><br>
    <div class="centerer">
    <input class="civilite" name="civilite" value="m" type="radio">Homme
    <input class="civilite" name="civilite" value="f" type="radio">Femme<br>
    <input class="civilite" name="civilite" value="t" type="radio"> Train<br>
    </div>
    <label for="ville" class="ville">Ville</label><br>
    <div class="centerer">
    <input class="ville" type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-.]{5,15}" title="caractères acceptés : a-zA-Z0-9-."><br><br>
    </div>
    <label for="cp" class="cp">Code Postal</label><br>
    <div class="centerer">
    <input class="cp" type="text" id="code_postal" name="codepostal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>
    </div>
    <label for="adresse" class="adresse">Adresse</label><br>
    <div class="centerer">
    <input class="adresse" id="adresse" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."><br>
    </div>
    <div class="subbtn">
    <input id="btn" type="submit" name="inscription" value="S'inscrire">
    </div>
</form>

<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();
?>