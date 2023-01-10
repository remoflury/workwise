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

require('config.php');

$sql = "INSERT INTO workspaces (users_id, objectname, status, imageurl, description, address, price, date) VALUES (:UserID, :ObjectName, :Status, :ImageUrl, :Description, :Address, :Price, :Date)";
$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute(array('UserID' => $userId, 'ObjectName' => $objectName, 'Status' => $status, 'ImageUrl' => $imageUrl, 'Description' => $description, 'Address' => $address, 'Price' => $price, 'Date' => $date));

if ($erfolg) {

    echo '{
      "error": false,
      "message": "Workspace erfolgreich erstellt."
    }';
} else {

  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es später nochmals."
  }';
};