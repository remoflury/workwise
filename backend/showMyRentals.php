<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

$userId = $_POST['userId'];

require 'config.php';

$sql = "SELECT * FROM rentals WHERE vermieter_users_id = '$userId'";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute();

if($success) {
  $results = $stmt->fetchAll();

  // ToDo statt in array pushen, nicht alles in sql stmt selektieren
  $workspaces = [];
  for ($i = 0; $i < count($results); $i++) {
    array_push($workspaces, $results[$i]['workspace_id']);
  }

  selectRentedWorkspaces($workspaces);

} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
  }';
}


function selectRentedWorkspaces($workspaces) {
  require 'config.php';
  // bereinige array um es in statement zu passen
  $workspaces = join("','",$workspaces); 

  // selektiere alle workspaces vom vermieter, welche gebucht worden sind
  $sql = "SELECT * FROM workspaces WHERE ID IN ('$workspaces')";
  $stmt = $pdo->prepare($sql);

  $success = $stmt->execute();

  if ($success) {
    $results = $stmt->fetchAll();
    $countResults = count($results);
    if ($countResults === 0) {
      echo '{
        "error": true,
        "message": "Sorry, es hat noch niemand deinen Workspace gebucht."
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