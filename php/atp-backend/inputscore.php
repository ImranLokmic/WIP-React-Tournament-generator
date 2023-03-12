<?php

include 'ini.php';



$match_id = $_POST['match_id'];
$stage = $_POST['stage'];
$player_1 = $_POST['player_1'];
$player_2 = $_POST['player_2'];
$player_1_result = $_POST['player_1_result'];
$player_2_result = $_POST['player_2_result'];

if ($player_1_result>$player_2_result){
    $winner = $player_1;
}else  $winner = $player_2;

$query = $pdo->prepare("UPDATE matches SET player_1_result='" . $player_1_result . "', player_2_result='" . $player_2_result . "' WHERE match_id='" . $match_id . "' ");
$query->execute();
$query->fetch();

if ($stage == 1 && $match_id%2 == 0) {
    switch($match_id){
    case 2:
    case 4:
    case 6:
        $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner. "' WHERE match_id='" . $match_id/2+25 . "' ");
        $query->execute();
        $query->fetch();
        break;
    case 8:
    case 10:
    case 12:
        $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner. "' WHERE match_id='" . $match_id/2+26 . "' ");
        $query->execute();
        $query->fetch();
        break;
    case 14:
    case 16:
    case 18:
        $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner. "' WHERE match_id='" . $match_id/2+27 . "' ");
        $query->execute();
        $query->fetch();
        break;
    case 20:
    case 22:
    case 24:
        $query = $pdo->prepare("UPDATE matches SET player_1='" . $winner. "' WHERE match_id='" . $match_id/2+28 . "' ");
        $query->execute();
        $query->fetch();
        break;
}
}
elseif($stage == 1 &&  $match_id%2 != 0){
    switch($match_id){
        case 1:
        case 3:
        case 5:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner. "' WHERE match_id='" . ($match_id+1)/2+24 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 7:
        case 9:
        case 11:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner. "' WHERE match_id='" . ($match_id+1)/2+25 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 13:
        case 15:
        case 17:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner. "' WHERE match_id='" . ($match_id+1)/2+26 . "' ");
            $query->execute();
            $query->fetch();
            break;
        case 19:
        case 21:
        case 23:
            $query = $pdo->prepare("UPDATE matches SET player_2='" . $winner. "' WHERE match_id='" . ($match_id+1)/2+27 . "' ");
            $query->execute();
            $query->fetch();
            break;
    }
}else echo "error";

