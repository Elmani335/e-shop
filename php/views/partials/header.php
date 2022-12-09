<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title><?= $pageTitle; ?></title>
</head>
<h1><?php
echo "E SHOP - SLAV LIMITED LTD";
// show if the user is logged in or not
if (isset($_SESSION['pseudo'])) {
    echo " - " . $_SESSION['pseudo'];

} else {
    echo " - Not logged in";
}
    ?>
</h1>
<link rel="stylesheet" href="css/navbar.css">
<div class="container">
<div class="navbar"
    <div class="row">
        <div class="col-md-12">
            <div class="navbar2">
                <a href="index.php">Home</a>
                <a href="index.php?page=products">Products</a>
                <a href="index.php?page=contact">Contact</a>
                <a href="index.php?page=login">Login</a>
                <a href="index.php?page=register">Register</a>
                <a href=<?php if ($IsUserConnected = true) {
                    echo "index.php";
                }
                else {
                    echo "index.php?page=products";
                } ?>>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</html>