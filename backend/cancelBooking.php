<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

$workspaceId = $_POST['workspaceId'];
$rented = false;

require 'config.php';

// update status in workspace table
$sql = "UPDATE workspaces SET rented=:Rented WHERE ID=:WorkspaceId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":Rented", $rented);
$stmt->bindParam(":WorkspaceId", $workspaceId);
$success = $stmt->execute();

if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da war the Dark Force im Spiel. Bitte versuche es später noch einmal."
  }';
  exit();
}


// delete workspace from rentals
$sql = "DELETE FROM rentals WHERE workspace_id = :WorkspaceId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":WorkspaceId", $workspaceId);
$success = $stmt->execute();

if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da war the Dark Force im Spiel. Bitte versuche es später noch einmal."
  }';
  exit();
}
echo '{
  "error": false,
  "message": "Booking canceled."
}';

