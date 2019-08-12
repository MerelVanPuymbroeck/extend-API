<?php

require 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$json = "{
    'id': '$idClean',
    'title': '$titleClean',
    'content': '$contentClean',
    'made_at': '2019-08-12'
}";

$jsonData =json_encode($json);

//Select table
$mysql= "INSERT INTO notes (id, title, content, made_at)
            VALUES ('$titleClean', '$contentClean','2019-08-12')";
$result = $conn->query($jsonData);

if ($result) {
    echo "$json";
} else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
}

$conn->close;
$title = $_GET['title'];
$text = $_GET ['text'];
$note = $_POST['note'];
print_r($title);
print_r($text);
print_r($note);
?>