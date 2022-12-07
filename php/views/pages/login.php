<?php
// create a login page to allow users to login to the site

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Login</title>
    <link rel=""
</head>

<body>
    <h1>Login</h1>
    <form action="actions/connexion.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="motDePasse">Mot de passe</label>
        <input type="password" name="motDePasse" id="motDePasse" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>






