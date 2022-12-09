<?php
require_once __DIR__ . '/../../php/init.php';
#require_once('../includes/db-config.php');

function admin_edit_product($productName, $productCateg, $productDesc, $productPrice, $productStock){
    global $IsUserConnected;
    global $user_admin;
    if ($IsUserConnected && $user_admin == 'admin' && isset($_POST['add_button'])){
        global $db;
        $query = $db->prepare('UPDATE product SET (name_product, categ_product, description_product, price_product, stock_product) WHERE (:product = $productName)');
        $query -> bindParam(':name_product', $productName);
        $query -> bindParam(':categ_product', $productCateg);
        $query -> bindParam(':description_product', $productDesc);
        $query -> bindParam(':price_product', $productPrice);
        $query -> bindParam(':stock_product', $productStock);
        $query -> execute();
    }else{
        echo 'user is not administrator or not connected';
    }
}

function admin_add_product($productName, $productCateg, $productDesc, $productPrice, $productStock){
    global $IsUserConnected;
    global $user_admin;
    if ($IsUserConnected && $user_admin == 'admin'){
        global $db;
        $query = $db->prepare('INSERT INTO product SET (name_product, categ_product, description_product, price_product, stock_product))');
        $query -> bindParam(':name_product', $productName);
        $query -> bindParam(':categ_product', $productCateg);
        $query -> bindParam(':description_product', $productDesc);
        $query -> bindParam(':price_product', $productPrice);
        $query -> bindParam(':stock_product', $productStock);
        $query -> execute();
    }else{
        echo 'user is not administrator or not connected';
    }
}

function set_error($error){
    $_SESSION['error'] = $error;
}


global $IsUserConnected;
if ($IsUserConnected == true && isset($_POST['logout'])) {
    function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        header('Location: ../index.php');
    }
}

if (isset($_POST['login'])) {
    echo "\n login";
    echo "<br>";
    $pseudo = $_POST['pseudo'];
    echo "\n pseudo: " . $pseudo;
    echo "<br>";
    $motDePasse = $_POST['motDePasse'];

    echo "\n motDePasse: " . $motDePasse;
    echo "<br>";
    global $db;
        $sql = "SELECT * FROM user WHERE pseudo_user = :pseudo";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user) {
            if (password_verify($motDePasse, $user['password_user'])) {
                $_SESSION['user'] = $user;

                header('Location: ../index.php');
            } else {
                set_error('Mot de passe incorrect');
                // set the error message to display on the login page
                $IsUserConnected = false;
                header('Location: ../index.php');
            }
        } else {
            set_error('Utilisateur inconnu');
            $IsUserConnected = false;
            header('Location: ../index.php');
        }
}

//vérification si l'user actuel est un admin

if ($_SESSION['admin']){
    global $user_admin;
    $user_admin = 'admin';
}



// register user, hash password, insert into db, redirect to login page, make sure to check if user already exists, if so, redirect to register page with error message, check is both password fields match, if not, redirect to register page with error message

if (isset($_POST['register'])) {
    $pseudo = $_POST['pseudo'];
    $motDePasse = $_POST['mdp'];
    $motDePasseConfirm = $_POST['mdp2'];
            if ($motDePasse == $motDePasseConfirm) {
                $motDePasseH = password_hash($motDePasse, PASSWORD_DEFAULT);
                global $db;
                $insert = "INSERT INTO user (pseudo_user, password_user) VALUES (:pseudo, :password)";
                $stmt = $db->prepare($insert);
                $stmt->bindParam(':pseudo', $pseudo);
                $stmt->bindParam(':password', $motDePasseH);
                $stmt->execute();
                header('Location: ../index.php');
            } else {
                echo "Password does not match!!";
            }
}

