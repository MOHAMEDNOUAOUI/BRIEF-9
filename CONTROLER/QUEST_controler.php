<?php
require_once '../MODULES/QUESTION.php';
require_once 'ANSWERS_CONTROLER.php';

class QUESTIONS_CONTROLLER {
    private $questionclass;
    private $questions = [];

    public function __construct() {
        $this->questionclass = new QUESTION();
        if (!isset($_SESSION['question_id'])) {
            $_SESSION['question_id'] = 1;
            $_SESSION['score'] = 0;
        }
    }

    public function getQuestionCLASS () {
        return $this->questionclass;
    }

    public function get_index() {
        return $_SESSION['question_id'];
    }

    public function getquestions () {
        return $this->questions;
    }

    public function get_question_count() {
        return count($this->questions);
    }

    public function get_question_at_index($index) {
        if ($index >= 0 && $index < count($this->questions)) {
            return $this->questions[$index];
        }
        return null; 
    }

    public function setArrayQuestion($ArrayQuestion) {
        $this->questions = $ArrayQuestion;
    }

    public function fetch_random_questions() {
        $randomQuestions = $this->questionclass->fetch_questions_random();
        if ($randomQuestions) {
            $this->questions = $randomQuestions;
        }
    }

    public function get_next_question() {
        $index = $_SESSION['question_id'];
        $_SESSION['question_id']++;
        if ($index < count($this->questions)) {
            
            return $this->get_question_at_index($index);
        }
        return null; 
    }
}

// $quest = new QUESTIONS_CONTROLLER();
// $quest->fetch_random_questions();
// $questions = $quest->getquestions();
// var_dump($questions);




