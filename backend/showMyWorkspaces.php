<?php 

if (!isset($_POST['submit'])) {
  header('location: /myworkspaces.php');
  exit();
}

require 'config.php';
session_start();
$userId = $_SESSION['userId'];

// select alle inserate von DB, die online online sind
$sql = "SELECT * FROM workspaces WHERE users_id = :UserId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':UserId', $userId);
$success = $stmt->execute();

// wenn statement erfolgreich
if ($success) {
  // fetche alle zutreffenden resultate und speichere sie in variable $results
  $results = $stmt->fetchAll();

  // gibt array als json zurück
  echo json_encode($results);
} else {
  echo '{
    "error": true,
    "message": "Ups, tut uns leid. Die Inserate konnten nicht geladen werden."
  }';
}