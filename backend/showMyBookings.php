<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

$userId = $_POST['userId'];

require 'config.php';

$sql = "SELECT * FROM rentals WHERE mieter_users_id = '$userId'";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute();

if ($success) {
  $results = $stmt->fetchAll();

  echo json_encode($results);
} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
}