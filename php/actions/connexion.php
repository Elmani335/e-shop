#<?php session_start();
#require_once('../init.php');
#require_once('../database.inc.php');
##spl_autoload_register(function($class){
##    require_once('../classes/'.$class.'.php');
##});
#
#require_once('../database.inc.php');
#if (isset($_POST['pseudo']) && isset($_POST['password'])){
#    $pseudo = $_POST['pseudo'];
#    $mdp = $_POST['password'];
#
#    $recuperationUtilisateur = $db->prepare('SELECT `password`, `id_user` FROM user');
#    $recuperationUtilisateur->execute([
#        'password' => $mdp
#    ]);
#    $utilisateurRecupere = $recuperationUtilisateur->fetch();
#    $mdp_valid = ($mdp == $utilisateurRecupere['password']) ? true : false;
#
#    if ($mdp_valid){
#        $recuperationUtilisateur = $db->prepare('SELECT id_user, pseudo  FROM user WHERE id_user = :id_user ');
#        $recuperationUtilisateur->setFetchMode(PDO::FETCH_CLASS, 'User');
#        $recuperationUtilisateur->execute([
#            'id_user' => $utilisateurRecupere['id_user'],
#        ]);
#        $utilisateurRecupere = $recuperationUtilisateur -> fetch();
#        $_SESSION['user'] = $utilisateurRecupere;
#        var_dump($_SESSION['user']);
#        $_SESSION['user']->updateLastLogin($db);
#        header('Location: ../index.php');
#        die();
#    }
#}
#header('Location: ../Login.php?msg=L\'email ou le mot de passe est invalide');
#die();
#?>