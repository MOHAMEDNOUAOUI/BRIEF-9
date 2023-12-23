<?php
require_once '../MODULES/QUESTION.php';

class QUESTIONS_CONTROLLER {
    private $questionclass;
    private $questions = [];

    public function __construct() {
        $this->questionclass = new QUESTION();
        if (!isset($_SESSION['question_id'])) {
            $_SESSION['question_id'] = 1;
        }
    }

    public function get_index() {
        return $_SESSION['question_id'];
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

$QUESTION_CONTROLLER = new QUESTIONS_CONTROLLER();

$QUESTION_CONTROLLER->fetch_random_questions();



if (isset($_POST['nextButton'])) {
    $nextQuestion = $QUESTION_CONTROLLER->get_next_question();
    if ($nextQuestion !== null) {
        $question = $nextQuestion;
    } else {
        unset($_SESSION['question_id']);
        header('location: ../VIEW/result.php');
        exit;
    }
}
else {
    $question = $QUESTION_CONTROLLER->get_question_at_index(0); 
}


$index = $QUESTION_CONTROLLER->get_index();


// if (isset($_SESSION["question_id"])) {
//     if (basename($_SERVER['PHP_SELF']) != $_SESSION["question_id"]) {
//          session_unset();
//     }
//  };


