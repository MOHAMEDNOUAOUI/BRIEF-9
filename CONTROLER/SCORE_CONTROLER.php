<?php
require '../MODULES/SCORE.php';
class SCORE_CONTROLER {
    private $score;

    public function __construct(){
        $this->score = new SCORE();
    }


    public function insert_player_score ($playername) {
        $this->score->setUserId(session_id());
        $this->score->setUserName($playername);
        $this->score->insert_score();
    }
}

$score_player_id = new SCORE_CONTROLER();
if(isset($_POST['PLAYERNAME'])) {
    $score_player_id->insert_player_score($_POST['PLAYERNAME']);
}


?>