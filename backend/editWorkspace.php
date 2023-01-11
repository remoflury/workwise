<?php 

if (!isset($_POST['submit'])) {
    header('location: myworkspaces.php');
    exit();
}

require 'config.php';

$objectName = $_POST['objectname'];
$status = $_POST['status'];
$imageUrl = $_POST['imageurl'];
$description = $_POST['description'];
$address = $_POST['address'];
$price = $_POST['price'];
$date = $_POST['date'];
$workspaceId = $_POST['workspaceid'];
session_start();
// $userId = $_SESSION['userId'];
// $username = $_SESSION['username'];

$sql = "UPDATE workspaces SET objectname=?, status=?, imageurl=?, description=?, address=?, price=?, date=? WHERE ID=?";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute([$objectName, $status, $imageUrl, $description, $address, $price, $date, $workspaceId]);

if ($success) {
    echo '{
        "error": false
    }';
} else {
    echo '{
        "error": true,
        "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
    }';
}

// echo $objectName;
// echo $status;
// echo $imageUrl;
// echo $description;
// echo $address;
// echo $price;
// echo $date;
// echo $workspaceId;