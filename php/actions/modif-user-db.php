<?php

  function login($email, $motDePasse){
    // get the database connection
    global $connection;
    // query to get the user information
    $query = "SELECT * FROM users WHERE email_user = :email";
    // prepare the query
    $statement = $connection->prepare($query);
    // bind the parameters
    $statement->bindParam(':email', $email);
    // execute the query
    $statement->execute();
    // check if the user exists
    if($statement->rowCount() > 0){
        // get the user information
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        // check the password
        if(password_verify($motDePasse, $user['motDePasse_user'])){
            // set the session
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['pseudo'] = $user['pseudo'];
            // prepare the query
            $statement = $connection->prepare($query);
            // bind the parameters
            $statement->bindParam(':id_user', $user['id_user']);
            // execute the query
            $statement->execute();
            // return true
            return true;
        }else{
            // return false
            return false;
        }
    }else{
        // return false
        return false;
    }
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







?>
