<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

require 'config.php';
$workspaceId = $_POST['workspaceId'];
$mieter = $_POST['mieter'];
$vermieter = $_POST['vermieter'];

// Statement um miete in DB einzufügen (rent)
$sql = "INSERT INTO rentals (workspace_id, mieter_users_id, vermieter_users_id) VALUES (:WorkspaceId, :Mieter, :Vermieter)";

$stmt = $pdo->prepare($sql);

// Statement ausführen
$success = $stmt->execute(array('WorkspaceId' => $workspaceId, 'Mieter' => $mieter, 'Vermieter' => $vermieter));

if ($success) {

  changeStatusRented($workspaceId);

} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
}


function changeStatusRented($workspaceId) {
  require 'config.php';

  // set status of rented workspace to 1 (= true, equals ' vermietet ') in DB
  $sql = "UPDATE workspaces SET rented=? WHERE ID = ?";
  $stmt = $pdo->prepare($sql);

  $success = $stmt->execute(["1", $workspaceId]);
  if ($success) {
    echo '{
      "error": false,
      "message": "Erfolgreich gebucht"
    }'; 

  } else {
    echo '{
      "error": true,
      "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
    }';
  }
}