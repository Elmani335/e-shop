<?php require_once('../classes/User.php');session_start(); ?>
<?php 

    require_once('../includes/database.inc.php');
    
    $passwordUser = $_POST['mdp'];
    $newPasswordUser = $_POST['new_mdp'];
    $newPasswordUserVerification = $_POST['new_mdp_verification'];

    $us = $_SESSION['user'];
    $usId = $us->getIdUser();
    
    $passwordBDD = $db->prepare("SELECT password_user FROM user WHERE id_user = :id_user");
    $passwordBDD->execute([
        'id_user' => $usId,
    ]);
    $passwordBDDRecupere = $passwordBDD->fetch();
    $oldPasswordValid = ($passwordUser == $passwordBDDRecupere['password_user']) ? true : false;//password_verify($passwordUser, $passwordBDDRecupere)

    if (isset($passwordUser) && isset($newPasswordUser) && isset($newPasswordUserVerification)) {
        if($oldPasswordValid){
            if($newPasswordUser == $newPasswordUserVerification){
              
               $newPasswordBDD = $db->prepare("UPDATE user SET password_user = :password_user WHERE id_user = :id_user");
               $newPasswordBDD->execute([
                'id_user' => $usId,
                'password_user' => $newPasswordUser,
               ]);
             
               header('Location: ../myaccount.php?msgPassword=Le mot de passe a bien été changer.');
               die();
            }
        }
    }

    header('Location: ../myaccount.php?msgPassword=Le mot de passe est invalide.');
    die();
?>