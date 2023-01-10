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

// TODO: check if user already exist

// Statement um Daten in DB einzufügen
$sql = "INSERT INTO users (username, email, password) VALUES (:Username, :Email, :Password)";

$stmt = $pdo->prepare($sql);

// Statement ausführen.
$erfolg = $stmt->execute(array('Username' => $username, 'Email' => $email, 'Password' => $passwordHashed));

// wenn Ausführung erfolgreich, dann...
if ($erfolg) {
    echo '{
      "error": false,
      "message": "Registrierung erfolgreich"
    }';
} 
// wenn Ausführung nicht erfolgreich, dann...
else {
    echo '{
      "error": true,
      "message": "Ups, da lief etwas schief. Bitte versuche es erneut."
    }';
};