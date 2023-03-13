<?php

include 'ini.php';

//Getting POST DATA
$match_id = $_POST['match_id'];


$check_set = $pdo->prepare("SELECT is_set FROM matches WHERE match_id='" . $match_id . "'");
$check_set->execute();
$is_set = $check_set->fetch(PDO::FETCH_COLUMN);

if ($is_set == 1) {
    $set_set = $pdo->prepare("UPDATE matches SET is_set=0 WHERE match_id='" . $match_id . "' ");
    $set_set->execute();
    $set_set->fetch();
} else {
    exit();
}
