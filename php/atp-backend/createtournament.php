<?php

include 'ini.php';

//Droping data from matches to create new bracket
$dropold = $pdo->query('TRUNCATE TABLE `matches`');

class Tournament
{
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function createMatch()
    {
        $tournament_name_prep = $this->pdo->prepare("SELECT tournament_id FROM tournaments INNER JOIN current_week ON tournaments.tournament_week=current_week.current_week");
        $tournament_name_prep->execute();
        $tournament_name = $tournament_name_prep->fetch(PDO::FETCH_ASSOC);
        $tournament_participants_prep = $this->pdo->prepare("SELECT player_name FROM players WHERE player_id>8");
        $tournament_participants_prep->execute();
        $tournament_participants = $tournament_participants_prep->fetchAll(PDO::FETCH_COLUMN);
        $current_year_prep = $this->pdo->prepare("SELECT current_year FROM current_year ");
        $current_year_prep->execute();
        $current_year=$current_year_prep->fetch(PDO::FETCH_COLUMN);
        //randomizing non seeded players in a array so the draw is random
        shuffle($tournament_participants);
        for ($i = 1; $i <= 24; $i++) {
            $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.  "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 1 ,'" . array_pop($tournament_participants) . "' ,'" . array_pop($tournament_participants) . "' , 0,0)");
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
        }
        $tournament_seeds_prep = $this->pdo->prepare("SELECT player_name FROM players WHERE player_id<9");
        $tournament_seeds_prep->execute();
        $tournament_seeds = $tournament_seeds_prep->fetchAll(PDO::FETCH_COLUMN);
        //Switch loop for seeded players in specific matches of round 2
        for ($i = 25; $i <= 40; $i++) {
            switch ($i) {
                case 25:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[0] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 28:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.  "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[7] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 29:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[3] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 32:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[4] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 33:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[5] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 36:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[2] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 37:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[6] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                case 40:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 , '" . $tournament_seeds[1] . "' ,'', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 2 ,'','', 0,0)");
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    break;
            }
        }
        for ($i = 41; $i <= 48; $i++) {
            $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.  "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 3 ,'','', 0,0)");
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
        }
        for ($i = 49; $i <= 52; $i++) {
            $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 4 ,'','', 0,0)");
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
        }
        for ($i = 53; $i <= 54; $i++) {
            $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . $i.   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 5 ,'','', 0,0)");
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
        }
            $query = $this->pdo->prepare("INSERT INTO matches (`match_id`, `tournament_id`, `match_year`,`tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) VALUES ('" . "55".   "', '" . $tournament_name["tournament_id"] . "' , '".$current_year."' , 6 ,'','', 0,0)");
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
    }

}

$db = new Tournament($pdo);
$tournament_setup = $db->createMatch();
