<?php
require_once __DIR__ . '/../../php/init.php';
#require_once('../includes/db-config.php');
echo "redirected to user-interaction.php";
echo "<br>";


    if(isset($_POST['login'])) {
        echo "\n login";
        echo "<br>";
        $pseudo = $_POST['pseudo'];
        echo "\n pseudo: " . $pseudo;
        echo "<br>";
        $motDePasse = $_POST['motDePasse'];
        $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
        echo "\n motDePasse: " . $motDePasse;
        echo "<br>";
        global $db;
        $sql = "SELECT * FROM user WHERE pseudo_user = :pseudo";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user) {
            if(password_verify($motDePasse, $user['motDePasse'])) {
                $_SESSION['pseudo_user'] = $user;


            } else {
                set_error('Mot de passe incorrect');
                // set the error message to display on the login page


            }
        } else {
            set_error('Utilisateur inconnu');

        }
    }

    function set_error($error) {
        $_SESSION['error'] = $error;
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
        $motDePasse = $_POST['mdp'];
        $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
        echo "\n Mot de passe : " . $motDePasse;
        // get the database connection
        include_once('../includes/db-config.php');
        include_once '../php/database.inc.php';
        global $db;
        // prepare the query
        $query = $db->prepare("INSERT INTO user (pseudo_user, password_user) VALUES (:pseudo, :motDePasse)");
        // execute the query
        $query->execute([
            'pseudo' => $pseudo,
            'motDePasse' => $motDePasse
        ]);
        // redirect to the login page
        header('Location: ../index.php');
    }

function get_products() {
    global $db;
    $query = 'SELECT * FROM product';
    return $query->fetchAll();
}


?>
