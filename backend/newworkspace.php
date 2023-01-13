<?php 
// wenn kein submit vorhanden, dann auf registration.php weiterleiten und php-skript beenden.
if(!isset($_POST['submit'])) {
  header("location: /newworkspace.php");
  exit();
}

$objectName = $_POST['objectname'];
$status = $_POST['status'];
$imageUrl = $_POST['imageurl'];
$description = $_POST['description'];
$address = $_POST['address'];
$price = $_POST['price'];
$date = $_POST['date'];
session_start();
$userId = $_SESSION['userId'];
$username = $_SESSION['username'];

require('config.php');

$sql = "
  INSERT INTO workspaces (users_id, objectname, status, imageurl, description, address, price, date, users_username) 
  VALUES (:UserID, :ObjectName, :Status, :ImageUrl, :Description, :Address, :Price, :Date, :Username)
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":UserID", $userId);
$stmt->bindParam(":ObjectName", $objectName);
$stmt->bindParam(":Status", $status);
$stmt->bindParam(":ImageUrl", $imageUrl);
$stmt->bindParam(":Description", $description);
$stmt->bindParam(":Address", $address);
$stmt->bindParam(":Price", $price);
$stmt->bindParam(":Date", $date);
$stmt->bindParam(":Username", $username);

$success = $stmt->execute();

if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es später nochmals."
  }';
  exit();
}

echo '{
  "error": false,
  "message": "Workspace erfolgreich erstellt."
}';