<?php
require_once '../MODULES/ANSWERS.php';
require_once '../CONTROLER/QUESTIONS_CONTROLER.php';
class ANSWERS_CONTROLER {
    private $answers;

    public function __construct() {
        $this->answers= new ANSWERS();
    }
    function answer_by_question ($question_id) {
        $array_4_questions = $this->answers->fetch_reponse_for_question($question_id);
        return $array_4_questions;
    }
}

$answer_controler = new ANSWERS_CONTROLER();
$answers = $answer_controler->answer_by_question($_SESSION['question_id']);
?>