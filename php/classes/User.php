<?php 
require_once(__DIR__.'../database.inc.php');
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

    /*public function __sleep(){
        return array($id_user,$email_user,$username_user,$created_date_user,$last_login_date_user,$id_game_playing);
    }*/
}
?>