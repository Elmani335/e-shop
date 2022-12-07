<?php 
require_once(__DIR__.'/../includes/database.inc.php');
class User{
    private $id_user;
    private $email_user;
    private $username_user;
    private $created_date_user;
    private $last_login_date_user;
    private $id_game_playing = 1;
    // Getters
    public function getIdUser(){
        return $this->id_user;
    }
    public function getEmailUser(){
        return $this->email_user;
    }
    public function getUsernameUser(){
        return $this->username_user;
    }
    public function getCreatedDateUser(){
        return $this->created_date_user;
    }
    public function getLastLoginDateUser(){
        return $this->last_login_date_user;
    }
    public function getIdGamePlaying(){
        return $this->id_game_playing;
    }
    public function updateLastLogin($db){
        $update = $db->prepare("UPDATE user SET last_login_date_user = CURRENT_TIMESTAMP WHERE id_user = :id");
        $update->execute([
            'id' => $this->getIdUser(),
        ]);
    }

    /*public function __sleep(){
        return array($id_user,$email_user,$username_user,$created_date_user,$last_login_date_user,$id_game_playing);
    }*/
}
?>