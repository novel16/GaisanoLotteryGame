<?php

$dbname = "lottery_game";
$server = "localhost";
$username = "root";
$password = getenv('MYSQL_PASSWORD');

try {
    $conn = new PDO("mysql:host=$server;dbname=lottery_game", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  } catch(PDOException $e) {
    echo "There is a problem with the connection: " . $e->getMessage();
  }

?>

