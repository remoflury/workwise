<?php 

// wenn submit nicht gesetzt wurde (seite nicht via url aufrufbar)
if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}
require 'config.php';

$workspaceId = $_POST['workspaceId'];

$sql = "SELECT * FROM workspaces WHERE ID = '$workspaceId'";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute();

if ($success) {
  $result = $stmt->fetchAll();
  $resultCount = count($result);

  // Wenn kein Resultat mit dieser ID vorhanden
  if ($resultCount !== 1) {
    echo '{
      "error": true,
      "message": "Ups, da lief etwas schief. Bitte versuche es später noch einmal."
    }';
  }
  
} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es später noch einmal."
  }';
}