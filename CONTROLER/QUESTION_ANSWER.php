<?php
require('./ANSWERS_CONTROLER.php');
require('./QUESTIONS_CONTROLER.php');
if(isset($_POST['useranswer']) && isset($_POST['question'])) {
    $questionID = $_POST['question'];
    $answerid = $_POST['useranswer'];

    $helpers = array('GOOD JOB !!!' , 'KEEP UP THE WORK' , 'GO CHAMP' , 'YOU GOT IT ALMOST');

    if($answerid === ''){
        ?>
        <div>NO REPONSE</div>
        <?php
    }
    else{
        $questionsclass = $QUESTION_CONTROLLER->getQuestionCLASS();
        $questionsclass->set_QestionID($questionID);
        $questionsclass->set_question_correction_by_question_id();
        $questioncorrect = $questionsclass->getCorrect_Answer(); // question ID
    
        // Debugging: Print the values to ensure they contain expected IDs


        $answerclass = $answer_controler->getAnswerCLASS();
        $answerclass->setQuestionID($questionID);
        $answerclass->set_response_for_question();
        $reponsetext = $answerclass->getAnswerText();

       if($answerid == $questioncorrect) {
        ?>
        <div class="d-flex flex-column">
        <h1>CORRECT SIRR</h1>
        <h1><?php echo $helpers[array_rand($helpers)]?></h1>
        </div>
        <?php
        $_SESSION['score']+=20;
       }
       else {
        ?>
        <h1>INCORRECT</h1><br>
        <h2><?php echo "Question ID: " . $questionID ?><br></h2>
        <h2><?php echo "CORRECT: " . $questioncorrect ?><br></h2>
        <h2><?php echo "USER_ANSWER: " . $answerid ?><br></h2>
        <h2><?php echo "Response: " . $reponsetext ?><br></h2>


                <?php

       }
}
}
?>


