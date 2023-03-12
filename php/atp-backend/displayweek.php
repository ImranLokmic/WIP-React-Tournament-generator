<?php
include 'ini.php';


class week
{
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function displayWeek()
    {
        $query = $this->pdo->prepare("SELECT current_week FROM current_week");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
$week = new week($pdo);
$data= $week->displayWeek();
echo $data["current_week"];

