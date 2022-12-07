<?php

#require_once('../includes/db-config.php');

  function login($pseudo, $password){
      require_once('../init.php');
      require_once('../database.inc.php');

      spl_autoload_register(function($class){
          require_once('../classes/'.$class.'.php');
      });

      require_once('../database.inc.php');
      if (isset($_POST['pseudo']) && isset($_POST['password'])) {
          $pseudo = $_POST['pseudo'];
          $mdp = $_POST['password'];

          $recuperationUtilisateur = $db->prepare('SELECT `password`, `id_user` FROM user');
          $recuperationUtilisateur->execute([
              'password' => $mdp
          ]);
          $utilisateurRecupere = $recuperationUtilisateur->fetch();
          $mdp_valid = ($mdp == $utilisateurRecupere['password']) ? true : false;

          if ($mdp_valid) {
              $recuperationUtilisateur = $db->prepare('SELECT id_user, pseudo  FROM user WHERE id_user = :id_user ');
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

    function logout(){
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        header('Location: ../index.php');
    }





// function register with information given in the inscription.php form

function register($pseudo, $motDePasse){
    // get the database connection
    global $connection;
    // query to insert the user
    $query = "INSERT INTO users (pseudo, password) VALUES (:pseudo, :mdp)";
    // prepare the query
    $statement = $connection->prepare($query);
    // bind the parameters
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':motDePasse', $motDePasse);
    // execute the query
    $statement->execute();
    // return true
    return true;
}

function get_products() {
    global $db;
    $query = $db->prepare('SELECT * FROM products');
    return $query->fetchAll();
}


?>
