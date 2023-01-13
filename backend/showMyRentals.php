<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

$vermieter = $_POST['userId'];

require 'config.php';
// selektiere alles von Rentals und Workspaces, wo die Vermieter ID = die User ID des Workspaces ist
$sql = "
  SELECT workspaces.*, rentals.*, users.username
  FROM workspaces
  INNER JOIN rentals ON workspaces.users_id = rentals.vermieter_users_id
  INNER JOIN users ON rentals.mieter_users_id = users.ID
  WHERE rentals.vermieter_users_id = '$vermieter'
";
// $sql = "
//   SELECT workspaces.*, rentals.*
//   FROM workspaces
//   INNER JOIN rentals ON workspaces.users_id = rentals.vermieter_users_id
//   WHERE rentals.vermieter_users_id = '$vermieter'
// ";

$stmt = $pdo->prepare($sql);
$success = $stmt->execute();

//falls DB Statement failt
if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);