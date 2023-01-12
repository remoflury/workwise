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

  // push all workspace_ids into same array
  $workspaces = [];
  for ($i = 0; $i < count($results); $i++) {
    array_push($workspaces, $results[$i]['workspace_id']);
  }

  selectBookedWorkplaces($workspaces);

} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
}

function selectBookedWorkplaces($workspaces) {
  require 'config.php';
  // bereinige array um es in statement zu passen
  $workspaces = join("','",$workspaces); 

  // selektiere alle workspaces von mieter, welche mieter gebucht hat
  $sql = "SELECT * FROM workspaces WHERE ID IN ('$workspaces')";
  $stmt = $pdo->prepare($sql);

  $success = $stmt->execute();

  if ($success) {
    $results = $stmt->fetchAll();
    $countResults = count($results);
    if ($countResults === 0) {
      echo '{
        "error": true,
        "message": "Sorry, du hast noch kein Workspace gebucht."
      }';
    } else {
      echo json_encode($results);
    }
  } else {
    echo '{
      "error": true,
      "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
    }';
  }
}