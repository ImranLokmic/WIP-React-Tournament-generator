<?php
include 'ini.php';

$copydata = $pdo->query('INSERT INTO `old_matches` (`match_id`, `tournament_id`,`match_year`, `tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result`) SELECT `match_id`, `tournament_id`, `match_year`, `tournament_stage`, `player_1`, `player_2`, `player_1_result`, `player_2_result` FROM `matches` ');
$nextweek = $pdo->query('UPDATE current_week SET current_week=current_week+1 ');
$dropold = $pdo->query('TRUNCATE TABLE `matches`');

