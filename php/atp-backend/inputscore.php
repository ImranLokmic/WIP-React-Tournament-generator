<?php

include 'ini.php';

//Getting POST DATA
$match_id = $_POST['match_id'];
$stage = $_POST['stage'];
$player_1 = $_POST['player_1'];
$player_2 = $_POST['player_2'];
$player_1_result = $_POST['player_1_result'];
$player_2_result = $_POST['player_2_result'];
$tournament_id = $_POST['tour_id'];



//Checking if the match is already inputed
$check_set = $pdo->prepare("SELECT is_set FROM matches WHERE match_id='" . $match_id . "'");
$check_set->execute();
$is_set = $check_set->fetch(PDO::FETCH_COLUMN);

if ($is_set == 1) {
    exit();
} else {
}

//Setting Winner and Loser Variable
if ($player_1_result > $player_2_result) {
    $winner = $player_1;
    $loser = $player_2;
} else {
    $winner = $player_2;
    $loser = $player_2;
};

//Setting Tournament rating
$tournament_rating_q = $pdo->prepare("SELECT tournament_rating FROM tournaments WHERE tournament_id='" . $tournament_id . "'");
$tournament_rating_q->execute();
$tournament_rating = $tournament_rating_q->fetch(PDO::FETCH_COLUMN);

//Point assignment based on tournament rating and stage of a match
if ($tournament_rating == 2000) {
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
} elseif ($tournament_rating == 1000) {
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

//Updating results
$query = $pdo->prepare("UPDATE matches SET player_1_result='" . $player_1_result . "', player_2_result='" . $player_2_result . "' WHERE match_id='" . $match_id . "' ");
$query->execute();
$query->fetch();

//Setting is_set variable to 1
$set_set = $pdo->prepare("UPDATE matches SET is_set=1 WHERE match_id='" . $match_id . "' ");
$set_set->execute();
$set_set->fetch();

//Pushing the winner to the next stage of a bracket
//Since its 56 players seeded bracket - First round has 8 bye's therefore its 48 matches first round
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
