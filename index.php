<?php

$configData = require 'config.php';

$databaseMsql = $configData['databaseMsql'];

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = $databaseMsql['username'];
 $dbpass = $configData['databaseMsql']['password'];
 $db = "example";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>