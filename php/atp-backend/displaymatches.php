<?php
include 'ini.php';

class Matches{
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function displayMatch(){
        $query = $this->pdo->prepare("SELECT match_id,tournament_stage,tournament_id,player_1, player_2, player_1_result, player_2_result FROM matches ORDER BY tournament_stage");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}

$db = new Matches($pdo);
$match = $db->displayMatch();
echo json_encode($match);