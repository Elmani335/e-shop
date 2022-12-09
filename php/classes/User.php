<?php 
require_once(__DIR__.'../database.inc.php');

$class = user::class;

class User {
    private $id_user;
    private $pseudo_user;
    // Getters
    public function getIdUser(){
        return $this->id_user;
    }
    public function getPseudoUser(){
        return $this->pseudo_user;
    }

}