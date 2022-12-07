<?php require_once('../classes/User.php');session_start(); ?>
<?php 

    require_once('../includes/database.inc.php');
    
    $oldEmail = $_POST['oldEmail'];
    $newEmail = $_POST['newEmail'];
    $password = $_POST['password'];
    $passwordVerification = $_POST['passwordVerification'];

    $us = $_SESSION['user'];
    $usId = $us->getIdUser();

    $BDD = $db->prepare("SELECT email_user, password_user FROM user WHERE id_user = :id_user");
    $BDD->execute([
        'id_user' => $usId,
    ]);
    $BDDRecupere = $BDD->fetch();

    $passwordValid = ($password == $BDDRecupere['password_user']) ? true : false;//password_verify($password, $BDDRecupere)

    if (isset( $oldEmail) && filter_var($oldEmail,FILTER_VALIDATE_EMAIL) && filter_var($newEmail,FILTER_VALIDATE_EMAIL ) && isset( $newEmail) && isset( $password) && isset( $passwordVerification)) {
        if ($oldEmail == $BDDRecupere['email_user'] && $password == $passwordVerification ) {
            if($passwordValid){
                $newEmailBDD = $db->prepare("UPDATE user SET email_user = :email_user WHERE id_user = :id_user");
               $newEmailBDD->execute([
                'id_user' => $usId,
                'email_user' => $newEmail,
               ]);
               header('Location: ../myaccount.php?msgEmail=L\'email a bien été changer.');
               die();

            }
        }
        
    }
    header('Location: ../myaccount.php?msgEmail=L\'email ou le mot de passe est invalide.');
    die();
    ?>
