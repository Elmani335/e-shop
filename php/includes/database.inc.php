<?php
 include_once('db-config.php');
    try {
        $db = new PDO ('mysql:host=' .$hostname.';dbname='.$conf['nameBDD'].';charset=utf8', $username , $password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } 
    catch (PDOException $e) {
        die('Erreur : ' . $e -> getMessage());
    }
?>