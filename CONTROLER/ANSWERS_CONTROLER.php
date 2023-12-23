<?php
require_once '../MODULES/ANSWERS.php';
class ANSWERS_CONTROLER {
    private $answers;


    public function __construct() {
        $this->answers= new ANSWERS();
    }

    public function getAnswerCLASS () {
        return $this->answers;
    }
    function answer_by_question ($id) {
        $array_4_questions = $this->answers->fetch_reponse_for_question($id);
        return $array_4_questions;
    }
}


?>