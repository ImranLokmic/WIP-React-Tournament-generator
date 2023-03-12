<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$host = 'localhost';
$name = 'atp';
$username = 'root';
$password = '';
$id = '';
try {
  $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $name, $username, $password);
} catch (PDOException $e) {
  exit('Error Connecting To DataBase');
}


