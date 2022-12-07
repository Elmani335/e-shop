<?php
$pageTitle = "Contact - SLAV LIMITED.LTD";

$error_message = get_error();

ob_start();
?>

<h1>Contact Page</h1>

<link rel="stylesheet" href="css/contact.css">
<form action="actions/send_contact.php" method="post">
    Full Name: <input type="text" name="fullname" /><br>
    Email: <input type="email" name="email" /><br>
    Phone: <input type="text" name="phone" /><br>
    Votre message:<br>
    <textarea name="text"></textarea>
    <br>
    <button type="submit">Envoyer</button>
</form>

<?php
// On arrete d'ecrire dans la memoire tampon et on recupere le contenu precedent
$pageContent = ob_get_clean();
?>
