<?php
$pageTitle = "register - Mon site.com";

$error_message = get_error();

ob_start();
?>

<form method="post" action="">
    <label for="pseudo" class="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-.]{1,20}" title="caractères acceptés : a-zA-Z0-9-." required="required"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" required="required"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="votre nom"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>

    <label for="civilite">Civilité</label><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <input name="civilite" value="f" type="radio">Femme<br>
    <input name="civilite" value="t" type="radio"> Train<br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-.]{5,15}" title="caractères acceptés : a-zA-Z0-9-."><br><br>

    <label for="cp">Code Postal</label><br>
    <input type="text" id="code_postal" name="codepostal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>

    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>

    <input type="submit" name="inscription" value="S'inscrire">
</form>

<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();
?>