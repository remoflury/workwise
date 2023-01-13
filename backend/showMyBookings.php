<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

$mieter = $_POST['userId'];

require 'config.php';


$sql = "
  SELECT workspaces.*, rentals.*, users.username
  FROM workspaces
  INNER JOIN rentals ON workspaces.ID = rentals.workspace_id
  INNER JOIN users ON rentals.vermieter_users_id = users.ID
  WHERE rentals.mieter_users_id = :Mieter
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":Mieter", $mieter);
$success = $stmt->execute();

if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
  exit();
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);