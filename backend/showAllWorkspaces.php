<?php 

// wenn kein submit vorhanden, dann auf index.php weiterleiten und php-skript beenden.
if(!isset($_POST['submit'])) {
  header("location: /index.php");
  exit();
}

require 'config.php';

// select alle inserate von DB, die online online sind
$sql = "SELECT * FROM workspaces WHERE status = 'online'";
$stmt = $pdo->prepare($sql);

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