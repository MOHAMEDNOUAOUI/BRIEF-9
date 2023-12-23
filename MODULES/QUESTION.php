<?php
require_once 'CONNECTION.php';

// unset($_SESSION['question_id']);

class QUESTION {

    private $db;

    private $question_id;

    private $question_text;

    private $question_description;

    private $question_theme;

    private $correct_answer;



    public function __construct() {
        $this->db = DATABASE::getconnection();
    }

    public function set_QestionID ($id) {
        $this->question_id = $id;
    }

    public function get_QuestionID () {
        return $this->question_id;
    }

    public function set_QuestionTEXT ($text) {
        $this->question_text = $text;
    }

    public function get_QuestionTEXT () {
        return $this->question_text;
    }

    public function setQuestionDescription($description) {
        $this->question_description = $description;
    }


    public function getQuestionDescription() {
        return $this->question_description;
    }


    public function setQuestionTheme($theme) {
        $this->question_theme = $theme;
    }


    public function getQuestionTheme() {
        return $this->question_theme;
    }

    public function setCorrect_Answer($correctanswer) {
        $this->correct_answer = $correctanswer;
    }

    public function getCorrect_Answer () {
        return $this->correct_answer;
    }


    public function set_question_correction_by_question_id () {
        $fetch = $this->db->prepare("SELECT * FROM questions WHERE question_id = :questionid");
        $fetch->bindValue(':questionid' , $this->get_QuestionID() , PDO::PARAM_INT);
        $fetch->execute();
        $result = $fetch->fetch(PDO::FETCH_ASSOC);
        $this->setCorrect_Answer($result['Correct_Answer']);
    }


    

    public function fetch_questions_random() {
            $fetch = $this->db->query("SELECT * FROM questions JOIN theme ON theme.theme_id = questions.question_theme");
            $result = $fetch->fetchALL(PDO::FETCH_ASSOC);
            $questions = [];

            foreach($result as $row) {
                $question = new QUESTION();
            $question->set_QestionID($row['question_id']);
            $question->set_QuestionTEXT($row['question_text']);
            $question->setQuestionDescription($row['question_description']);
            $question->setQuestionTheme($row['question_theme']);
            $question->setCorrect_Answer($row['Correct_Answer']);
            $questions [] = $question;
            shuffle($questions);
            }
            return $questions;   
    }

}

?>



