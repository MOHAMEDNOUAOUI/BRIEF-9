<?php
require_once 'QUEST_controler.php';
$QUESTION_CONTROLLER = new QUESTIONS_CONTROLLER();
$answer_controler = new ANSWERS_CONTROLER();

$QUESTION_CONTROLLER->fetch_random_questions();

if (isset($_POST['nextButton'])) {
    $nextQuestion = $QUESTION_CONTROLLER->get_next_question();
    if ($nextQuestion !== null) {
        $question = $nextQuestion;
        $answers = $answer_controler->answer_by_question($question->get_QuestionID());
    } else {
        unset($_SESSION['question_id']);
        header('location: ../VIEW/result.php');
        exit;
    }
}
else {
    $question = $QUESTION_CONTROLLER->get_question_at_index(0); 
    $answers = $answer_controler->answer_by_question($question->get_QuestionID());
}


$index = $QUESTION_CONTROLLER->get_index();





// if (isset($_SESSION["question_id"])) {
//     if (basename($_SERVER['PHP_SELF']) != $_SESSION["question_id"]) {
//          session_unset();
//     }
//  };


