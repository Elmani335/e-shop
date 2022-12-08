<?php
require_once __DIR__ . '/../../php/init.php';
#require_once('../includes/db-config.php');
echo "redirected to user-interaction.php";
echo "<br>";

// if(isset($_POST['register'])){

    if(isset($_POST['login'])) {
        echo "\n login";
        echo "<br>";
        $pseudo = $_POST['pseudo'];
        require_once('php/init.php');
        require_once('php/database.inc.php');

        require_once('./database.inc.php');
        if (isset($_POST['pseudo']) && isset($_POST['password'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $recuperationUtilisateur = $db->prepare('SELECT `password`, `id_user` FROM user WHERE pseudo = $pseudo');
            $recuperationUtilisateur->execute([
                'password' => $password,
                'pseudo' => $pseudo
            ]);
            $utilisateurRecupere = $recuperationUtilisateur->fetch();
            $mdp_valid = ($mdp == $utilisateurRecupere['password']) ? true : false;

            if ($mdp_valid) {
                $recuperationUtilisateur = $db->prepare('SELECT id_user, pseudo  FROM user WHERE id_user = $userid ');
                $recuperationUtilisateur->setFetchMode(PDO::FETCH_CLASS, 'User');
                $recuperationUtilisateur->execute([
                        'id_user' => $utilisateurRecupere['id_user'],
                    ]);
                    $utilisateurRecupere = $recuperationUtilisateur->fetch();
                    $_SESSION['user'] = $utilisateurRecupere;
                    var_dump($_SESSION['user']);
                    $_SESSION['user']->updateLastLogin($db);
                    header('Location: ../index.php');
                    die();
                }
            }
            header('Location: ../Login.php?msg=L\'email ou le mot de passe est invalide');
            die();
        }

    function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        header('Location: ../index.php');
    }


// function register with information given in the register.php form
    if(isset($_POST['register'])) {
        echo "\n register";
        echo "<br>";
        $pseudo = $_POST['pseudo'];
        echo "\n pseudo : " . $pseudo;
        echo "<br>";
        // send the information to the database securely
        $motDePasse = password_hash($password, PASSWORD_DEFAULT);
        echo "\n Mot de passe : " . $motDePasse;
        // get the database connection
        global $connection;
        // query to insert the user
        $query = "INSERT INTO user (pseudo, password) VALUES (:pseudo, :mdp)";

    }

function get_products() {
    global $db;
    $query = 'SELECT * FROM product';
    return $query->fetchAll();
}


?>
