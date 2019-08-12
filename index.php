<?php

require 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$title = $_GET['title'];
$text = $_GET ['text'];
$note = $_POST['note'];
print_r($title);
print_r($text);
?>