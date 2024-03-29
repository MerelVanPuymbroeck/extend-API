
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

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$status = [
    "status" => "success",
    "notes" => [],
];

try{
    $sql = "SELECT * FROM notes WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    
    $id = $id;
    
    $stmt->execute();
    
    $notes = $stmt->fetchAll();
    
    if (count($notes) > 0) {
        foreach ($notes as $note) {
            array_push($status['notes'], [
                'id' => $note['id'],
                'title' => $note['title'],
                'author' => $note['author'],
                'message' => $note['message'],
            ]);
        }
    } else {
        $status['status'] = "error";
        $status['message'] = "no note found with this id";
    }
    
    
    echo json_encode($status);
    } catch(PDOException $e){
    die("ERROR: Could not prepare/execute query: $sql. " . $e->getmessage());
    }
