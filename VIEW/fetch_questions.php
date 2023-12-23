<?php
require_once '../CONTROLER/QUESTIONS_CONTROLER.php';
require_once '../CONTROLER/ANSWERS_CONTROLER.php';

    ?>
    <div class="ALL d-flex flex-column w-100">
<div class="containerquestions d-flex flex-column justify-content-center align-items-center w-100 gap-5">
<div class="question w-75 text-center bg-primary text-white py-4">
<?php echo $question->get_Questiontext()?>
<?php echo '<br>' . $index?>
</div>
<div class="reponses row w-100 gap-5 align-items-center justify-content-center">
    <?php
    foreach($answers as $answer) {
        ?>

        <div class="answser1 col-5 bg-danger text-center py-3">
        <input type="radio" name="answer" onclick="answerid (<?php echo $answer->getAnswerId()?>)" class="answer-radio" value="<?php echo $answer->getAnswerId()?>">
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
        <button onclick="send_ajax_fetch_question ()">NEXT</button>
        <?php
    ?>
</div>
</div>
    <?php

?>

