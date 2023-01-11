<?php 

if (!isset($_POST['submit'])) {
    header('location: myworkspaces.php');
    exit();
}

require 'config.php';

$workspaceId = $_POST['workspaceid'];

$sql = "DELETE FROM workspaces WHERE ID = ?";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute([$workspaceId]);


if ($success) {
    echo '{
        "error": false
    }';
} else {
    echo '{
        "error": true
        "message": "Ups, da war the Dark Force im Spiel. Bitte versuche es später noch einmal."
    }';
}