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

$sql = "UPDATE workspaces SET objectname=:ObjectName, status=:Status, imageurl=:ImageUrl, description=:Description, address=:Address, price=:Price, date=:Date WHERE ID=:ID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":ObjectName", $objectName);
$stmt->bindParam(":Status", $status);
$stmt->bindParam(":ImageUrl", $imageUrl);
$stmt->bindParam(":Description", $description);
$stmt->bindParam(":Address", $address);
$stmt->bindParam(":Price", $price);
$stmt->bindParam(":Date", $date);
$stmt->bindParam(":ID", $workspaceId);

$success = $stmt->execute();

if (!$success) {
    echo '{
        "error": true,
        "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
    }';
} 

echo '{
    "error": false
}';