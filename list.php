<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: GET,PUT,DELET,POST");
// header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include 'config.php';

$status = [
    "status" => "success",
    "notes" => [],
];

try{
    $sql = "SELECT id,title FROM notes ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();
    $notes = $stmt->fetchAll();
    
  
        foreach ($notes as $note) {
            array_push($status['notes'], [
                'id' => $note['id'],
                'title' => $note['title'],
                //'author' => $note['author'],
                //'message' => $note['message'],
            ]);

        }

    echo json_encode($status);
} catch(PDOException $e){
    die("ERROR: Could not prepare/execute query: $sql. " . $e->getmessage());
}
