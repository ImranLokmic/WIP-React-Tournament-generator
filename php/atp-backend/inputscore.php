<?php

include 'ini.php';



$match_id = $_POST['match_id'];
$stage = $_POST['stage'];
$player_1 = $_POST['player_1'];
$player_2 = $_POST['player_2'];
$player_1_result = $_POST['player_1_result'];
$player_2_result = $_POST['player_2_result'];
$tournament_id = $_POST['tour_id'];

if ($player_1_result > $player_2_result) {
    $winner = $player_1;
    $loser = $player_2;
} else {
    $winner = $player_2;
    $loser = $player_2;
};


$tournament_rating = $pdo->prepare("SELECT tournament_rating FROM tournaments WHERE tournament_id='" . $tournament_id . "'");
$tournament_rating->execute();
$tournament_rating->fetch();

if ($tournament_rating = 2000) {
    switch ($stage) {
        case 1:
            break;
        case 2:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+90 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 3:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+180 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 4:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+360 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 5:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+720 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 6:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+1200 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
    }

    if ($stage == 6) {
        $query = $pdo->prepare("UPDATE players SET player_points=player_points+2000 WHERE player_name='" . $winner . "' ");
        $query->execute();
        $query->fetch();
    }
} elseif ($tournament_rating = 1000) {
    switch ($stage) {
        case 1:
            break;
        case 2:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+45 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 3:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+90 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 4:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+180 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 5:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+360 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 6:
            $query = $pdo->prepare("UPDATE players SET player_points=player_points+600 WHERE player_name='" . $loser . "' ");
            $query->execute();
            $query->fetch();
            break;
    }

    if ($stage == 6) {
        $query = $pdo->prepare("UPDATE players SET player_points=player_points+1000 WHERE player_name='" . $winner . "' ");
        $query->execute();
        $query->fetch();
    }
}

$query = $pdo->prepare("UPDATE matches SET player_1_result='" . $player_1_result . "', player_2_result='" . $player_2_result . "' WHERE match_id='" . $match_id . "' ");
$query->execute();
$query->fetch();

if ($stage == 1 && $match_id % 2 == 0) {
    switch ($match_id) {
        case 2:
        case 4:
        case 6:
            $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner . "' WHERE match_id='" . $match_id / 2 + 25 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 8:
        case 10:
        case 12:
            $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner . "' WHERE match_id='" . $match_id / 2 + 26 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 14:
        case 16:
        case 18:
            $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner . "' WHERE match_id='" . $match_id / 2 + 27 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 20:
        case 22:
        case 24:
            $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner . "' WHERE match_id='" . $match_id / 2 + 28 . "' ");
            $query->execute();
            $query->fetch();
            break;
    }
} elseif ($stage == 1 &&  $match_id % 2 != 0) {
    switch ($match_id) {
        case 1:
        case 3:
        case 5:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner . "' WHERE match_id='" . ($match_id + 1) / 2 + 24 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 7:
        case 9:
        case 11:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner . "' WHERE match_id='" . ($match_id + 1) / 2 + 25 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 13:
        case 15:
        case 17:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner . "' WHERE match_id='" . ($match_id + 1) / 2 + 26 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 19:
        case 21:
        case 23:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner . "' WHERE match_id='" . ($match_id + 1) / 2 + 27 . "' ");
            $query->execute();
            $query->fetch();
            break;
    }
} elseif ($match_id % 2 != 0) {
    $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner . "' WHERE match_id='" . ($match_id + 1) / 2 + 28 . "' ");
    $query->execute();
    $query->fetch();
} elseif ($match_id % 2 == 0) {
    $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner . "' WHERE match_id='" . $match_id / 2 + 28 . "' ");
    $query->execute();
    $query->fetch();
} else echo 'err';
