<?php

include 'ini.php';


class Info
{
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function tournamentInfo()
    {
        $query = $this->pdo->prepare("SELECT tournament_name, tournament_rating, tournament_surface FROM tournaments INNER JOIN current_week ON tournaments.tournament_week=current_week.current_week");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

   
 
}

$db = new Info($pdo);
$tournament_details = $db->tournamentInfo();
echo json_encode($tournament_details);
