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

$sql = "INSERT INTO users (username, email, password) VALUES (:Username, :Email, :Password)";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute(array('Username' => $username, 'Email' => $email, 'Password' => $password));

if ($erfolg) {

    echo 'Registrierung erfolgreich.';
} else {

    echo '$erfolg';
};