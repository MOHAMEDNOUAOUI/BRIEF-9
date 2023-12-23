<?php
    session_start();
    if(isset($_SESSION['question_id'])) {
        unset($_SESSION['question_id']);
        session_destroy();
    }
?>