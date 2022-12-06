<?php session_start();
spl_autoload_register(function($class){
    require_once('../classes/'.$class.'.php');
});
require_once('../includes/database.inc.php');
if (isset($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL ) && isset($_POST['motDePasse'])){
    $email = trim(htmlspecialchars($_POST['email']));
    $mdp = $_POST['motDePasse'];

    $recuperationUtilisateur = $db->prepare('SELECT password_user, id_user FROM user WHERE email_user = :email ');
    $recuperationUtilisateur->execute([
        'email' => $email
    ]);
    $utilisateurRecupere = $recuperationUtilisateur->fetch();
    $mdp_valid = ($mdp == $utilisateurRecupere['password_user']) ? true : false;  //password_verify($mdp,$utilisateurRecupere['password_user']);

    if ($mdp_valid){
        $recuperationUtilisateur = $db->prepare('SELECT id_user, email_user, username_user, created_date_user, last_login_date_user  FROM user WHERE id_user = :id_user ');
        $recuperationUtilisateur->setFetchMode(PDO::FETCH_CLASS, 'User');
        $recuperationUtilisateur->execute([
            'id_user' => $utilisateurRecupere['id_user'],
        ]);
        $utilisateurRecupere = $recuperationUtilisateur -> fetch();
        $_SESSION['user'] = $utilisateurRecupere;
        var_dump($_SESSION['user']);
        $_SESSION['user']->updateLastLogin($db);
        header('Location: ../index.php');
        die();
    }
}
header('Location: ../Login.php?msg=L\'email ou le mot de passe est invalide');
die();
?>