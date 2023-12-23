<?php
require_once 'CONNECTION.php';

class SCORE {
    private $db;
    private $user_id;
    private $user_name;
    private $user_score;

    public function __construct() {
        $this->db = DATABASE::getconnection();
    }

    // Setter methods (mutators)
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    public function setUserScore($user_score) {
        $this->user_score = $user_score;
    }

    // Getter methods (accessors)
    public function getUserId() {
        return $this->user_id;
    }

    public function getUserName() {
        return $this->user_name;
    }
    public function getUserScore() {
        return $this->user_score;
    }


    public function insert_score () {
        $inser = $this->db->prepare("INSERT INTO score (user_id,user_name) VALUES (:userID,:userNAME)");
        $inser->bindValue(':userID' , $this->getUserId() , PDO::PARAM_STR);
        $inser->bindValue(':userNAME' , $this->getUserName() , PDO::PARAM_STR);
        $inser->execute();
    }

}


?>