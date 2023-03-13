<?php
include 'ini.php';

$calculate_points=$pdo->query('UPDATE `players` SET player_points=`w1`+`w2`+`w3`+`w4`+`w5`+`w6`+`w7`+`w8`+`w9`+`w10`+`w11`+`w12`+`w13`');
$newtable = $pdo->query('CREATE TABLE `newplayers` LIKE `players`');
$copydata = $pdo->query('INSERT INTO `newplayers` (`player_name`, `player_points`,`w1`,`w2`,`w3`,`w4`,`w5`,`w6`,`w7`,`w8`,`w9`,`w10`,`w11`,`w12`,`w13`) SELECT `player_name`, `player_points`, `w1`,`w2`,`w3`,`w4`,`w5`,`w6`,`w7`,`w8`,`w9`,`w10`,`w11`,`w12`,`w13` FROM `players` ORDER BY `player_points` DESC');
$dropold = $pdo->query('DROP TABLE `players`');
$replace = $pdo->query('RENAME TABLE `newplayers` TO `players`;');

class display{
    function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
        public function displayUnique($sku)
        {    
            $query = $this->pdo->prepare("SELECT player_id FROM players WHERE player_id='".$sku."'");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }	
    public function displayName($sku)
    {    
        $query = $this->pdo->prepare("SELECT player_name FROM players WHERE player_id='".$sku."' ");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }	
    public function displayPoints($sku)
    {    
        $query = $this->pdo->prepare("SELECT player_points  FROM players WHERE player_id='".$sku."'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function displayWeeks($sku){
        $query = $this->pdo->prepare("SELECT `w1`,`w2`,`w3`,`w4`,`w5`,`w6`,`w7`,`w8`,`w9`,`w10`,`w11`,`w12`,`w13` FROM players WHERE player_id='".$sku."'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }	
  }

$db = new display($pdo);
$rows = $pdo->query('SELECT player_id FROM players')->fetchAll(PDO::FETCH_NUM);
$rowcount = $pdo->query('SELECT count(*) FROM players')->fetchColumn();
$id = '';
if (!$id) echo '[';
$counter = 1;
foreach ($rows as $i) {
  $unique = $db->displayUnique($i[0]);
  $name = $db->displayName($i[0]);
  $value = $db->displayPoints($i[0]);
  $weeks = $db->displayWeeks($i[0]);
  $result = $unique + $name + $value + $weeks;
  echo json_encode($result);
  if ($rowcount != $counter) echo ',';
  $counter++;
}
if (!$id) echo ']';
