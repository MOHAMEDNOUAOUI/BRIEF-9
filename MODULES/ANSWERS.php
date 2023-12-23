<?php
class ANSWERS {
    private $db;

    private $Answer_id;
    private $Answer_text;
    private $Answer_points;
    private $Question_id;

    public function __construct() {
        $this->db = DATABASE::getconnection();
    }

    // Setters
    public function setAnswerId($id) {
        $this->Answer_id = $id;
    }

    public function setAnswerText($text) {
        $this->Answer_text = $text;
    }

    public function setAnswerPoints($points) {
        $this->Answer_points = $points;
    }


    public function setQuestionID ($questionID) {
        $this->Question_id = $questionID;
    }

    // Getters
    public function getAnswerId() {
        return $this->Answer_id;
    }

    public function getAnswerText() {
        return $this->Answer_text;
    }

    public function getAnswerPoints() {
        return $this->Answer_points;
    }


    public function getQuestionID () {
        return $this->Question_id;
    }

    public function set_response_for_question() {
        $fetch = $this->db->prepare("SELECT answer_text FROM answers WHERE question_id = :Q_id LIMIT 1");
        $fetch->bindValue(':Q_id', $this->getQuestionID(), PDO::PARAM_INT);
        $fetch->execute();
        $result = $fetch->fetch(PDO::FETCH_ASSOC);
        $this->setAnswerText($result['answer_text']);
    }
    

    public function fetch_reponse_for_question ($question_id) {
        $fetch = $this->db->prepare("SELECT * FROM answers WHERE question_id = :Q_id");
        $fetch->bindValue(':Q_id' , $question_id,PDO::PARAM_INT);
        $fetch->execute();
        $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
        $answers = [];
        foreach($result as $reponse) {
            $answer = new ANSWERS();
            $answer->setAnswerId($reponse['answer_id']);
            $answer->setAnswerText($reponse['answer_text']);
            $answer->setQuestionID($reponse['question_id']);
            $answers [] = $answer;
        }
        return $answers;
    }
}


?>