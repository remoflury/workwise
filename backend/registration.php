<?php 

// wenn kein submit vorhanden, dann auf registration.php weiterleiten und php-skript beenden.
if(!isset($_POST['submit'])) {
  header("location: /registration.php");
  exit();
}

require('config.php');

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

// Passwort verschlüsseln
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

// check if user already exist
$sql = "SELECT email FROM users WHERE email = :Email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":Email", $email);

$success = $stmt->execute();

if (!$success) {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es erneut."
  }';
  exit();
}

$results = $stmt->fetchAll();
$countResult = count($results);

if ($countResult === 1) {
  echo '{
    "error": true,
    "message": "Es ist schon ein User mit derselben Email-Adresse vorhanden. Bitte benutze eine andere Email."
  }';
  exit();
}

// Statement um user in DB einzufügen (registration)
$sql = "
  INSERT INTO users (username, email, password)
  VALUES (:Username, :Email, :Password)
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":Username", $username);
$stmt->bindParam(":Email", $email);
$stmt->bindParam(":Password", $passwordHashed);

// Statement ausführen.
$success = $stmt->execute();

if(!$success) {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es erneut."
  }';
  exit();
}

echo '{
  "error": false,
  "message": "Registrierung erfolgreich"
}';