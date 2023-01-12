<?php 

if (!isset($_POST['submit'])) {
  header('location: login.php');
  exit();
}

require 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

// check, if user exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$stmt = $pdo->prepare($sql);

$success = $stmt->execute();

// wenn DB Statement erfolgreich
if ($success) {
  $results = $stmt->fetchAll();
  $countResult = count($results);

  // wenn ein user mit dieser Email vorhanden
  if ($countResult == 1) {
    $dbPassword = $results[0]['password'];
    $userId = $results[0]['ID'];
    $username = $results[0]['username'];
    $timestamp = time();
    checkPassword($password, $dbPassword, $userId);
    startSession($userId, $username, $timestamp);
    exit();
  }
} else {
  echo '{
    "error": true,
    "message": "Ups, da lief etwas schief. Bitte versuche es erneut."
  }';
  exit();
}

function checkPassword($password, $dbPassword, $userId) {
  if (password_verify($password, $dbPassword)) {
    echo '{
      "error": false,
      "message": "Login erfolgreich"
    }';
  } else {
    echo '{
      "error": true,
      "message": "Email und Passwort stimmen nicht überein."
    }';
    exit();
  }
}

function startSession($userId, $username, $timestamp) {
  session_start();
  $_SESSION['userId'] = $userId;
  $_SESSION['username'] = $username;
  $_SESSION['timestamp'] = $timestamp;
}