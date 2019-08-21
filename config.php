<?php
$servername = "localhost";
$username = "admin";
$password = "dIAPGnAjOW2G";
$db = "notepad";

try{
$pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $db, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
die("ERROR: Could not connect. " . $e->getMessage());
}