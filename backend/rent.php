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

// Statement ausführen.
$success = $stmt->execute(array('WorkspaceId' => $workspaceId, 'Mieter' => $mieter, 'Vermieter' => $vermieter));

echo $success;