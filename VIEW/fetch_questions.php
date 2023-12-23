<?php
require_once '../CONTROLER/QUESTIONS_CONTROLER.php';
require_once '../CONTROLER/ANSWERS_CONTROLER.php';

    ?>

    <div class="cont d-flex flex-column w-100 h-100">
    <div class="d-flex justify-content-between w-100 align-items-center" style="padding:0 8rem">
        <div class="score">Score:<?php echo $_SESSION['score']?></div>
        <div class="page"><?php echo $_SESSION['question_id']."/".$QUESTION_CONTROLLER->get_question_count()?></div>
    </div>
    <div class="ALL d-flex flex-column w-100">
<div class="containerquestions d-flex flex-column justify-content-center align-items-center w-100 gap-5">
<div class="question w-75 text-center bg-primary text-white py-4" data-key="<?php echo $question->get_QuestionID()?>">
<?php echo $question->get_Questiontext()?>
<?php echo '<br>' . $index?>
</div>
<div class="reponses row w-100 gap-5 align-items-center justify-content-center">
    <?php
    foreach($answers as $answer) {
        ?>

        <div class="answser1 col-5 bg-danger text-center py-3">
        <input type="radio" name="answer" class="answer-radio" value="<?php echo $answer->getAnswerId()?>">
            <?php echo $answer->getAnswerText()?>
        </div>
        <?php
    }
    ?>
</div>


</div>

<div class="next float-right">
    <?php
        ?>
        <button class="NEXT" onclick="answerid ()">NEXT</button>
        <?php
    ?>
</div>
</div>
    </div>
    <?php

?>

