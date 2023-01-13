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

// $sql = "SELECT * FROM rentals WHERE mieter_users_id = :UserId";
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(":UserId", $userId);

// $success = $stmt->execute();

// if ($success) {
//   $results = $stmt->fetchAll();

//   // push all workspace_ids into same array
//   $workspaces = [];
//   for ($i = 0; $i < count($results); $i++) {
//     array_push($workspaces, $results[$i]['workspace_id']);
//   }

//   selectBookedWorkplaces($workspaces);

// } else {
//   echo '{
//     "error": true,
//     "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
//   }';
// }

// function selectBookedWorkplaces($workspaces) {
//   require 'config.php';
//   // bereinige array um es in statement zu passen
//   $workspaces = join("','",$workspaces); 

//   // selektiere alle workspaces von mieter, welche mieter gebucht hat
//   $sql = "SELECT * FROM workspaces WHERE ID IN (:Workspaces)";
//   $stmt = $pdo->prepare($sql);
//   $stmt->bindParam(":Workspaces", $workspaces);

//   $success = $stmt->execute();

//   if ($success) {
//     $results = $stmt->fetchAll();
//     $countResults = count($results);
//     if ($countResults === 0) {
//       echo '{
//         "error": true,
//         "message": "Sorry, du hast noch kein Workspace gebucht."
//       }';
//     } else {
//       echo json_encode($results);
//     }
//   } else {
//     echo '{
//       "error": true,
//       "message": "Ups, da lief etwas schief. Bitte lade die Seite neu und versuche es noch einmal."
//     }';
//   }
// }