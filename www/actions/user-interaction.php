<?php
//require_once('./init.php');

/*
  function login(){
      require_once('./init.php');
      require_once('./database.inc.php');

      #spl_autoload_register(function($class){
      #    require_once('../classes/'.$class.'.php');
      #});

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
*/

/*
  function logout(){
      session_start();
      if (isset($_SESSION['user'])) {
          session_destroy();
      }
      header('Location: ../index.php');
  }
*/

// function register with information given in the register.php form

function register($pseudo, $motDePasse){
    // get the database connection
    global $connection;
    // query to insert the user
    $query = "INSERT INTO user (pseudo_user, password_user) VALUES (:pseudo, :motDePasse)";
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

if (isset($_POST["register"])){
    register($_POST["pseudo"], $_POST["mdp"]);
    header(__DIR__ . "index.php");
}elseif (isset($_POST["login"])){
    login();
}