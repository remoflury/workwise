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

// TODO: check if user already exist

$sql = "INSERT INTO users (username, email, password) VALUES (:Username, :Email, :Password)";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute(array('Username' => $username, 'Email' => $email, 'Password' => $password));

if ($erfolg) {

    echo '{
      "error": false,
      "message": "Registrierung erfolgreich"
    }';
} else {

    echo '{
      "error": true,
      "message": "Ups, da lief etwas schief. Bitte versuche es erneut."
    }';
};