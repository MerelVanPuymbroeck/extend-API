<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET,PUT,DELET,POST");
// header("Access-Control-Allow-Credentials: true");
// header('Content-Type: application/json');

include 'config.php';

$titleValue = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$authorValue = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
$messageValue = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$status = [
"status" => "success",
];

$errors = [];

//validate

if ($titleValue == "" || $titleValue == null) {
$errors['title'] = "title is empty";
}


if ($authorValue == "" || $authorValue == null) {
$errors['author'] = "author is empty";
}

if ($messageValue == "" || $messageValue == null) {
$errors['message'] = "messages is empty";
}

if (!empty($errors)) {
$status['status'] = "error";
$status['errors'] = $errors;
echo json_encode($status);
die;
}

try{

$sql = "INSERT INTO notes (title, author, message) VALUES (:title, :author, :message)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam('title', $title, PDO::PARAM_STR);
$stmt->bindParam('author', $author, PDO::PARAM_STR);
$stmt->bindParam('message', $message, PDO::PARAM_STR);

$title = $titleValue;
$author = $authorValue;
$message = $messageValue;

$stmt->execute();

$status['message'] = "note successfully created";
echo json_encode($status);
} catch (PDOException $e){
    die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
}