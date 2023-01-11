<?php 

session_start();

if (isset($_SESSION['userId'])) {

  // wenn session-timestamp älter als 30min, dann logge aus
  if ($_SESSION['timestamp'] + 1800 < time()) {
    // session_start();
    session_unset();
    session_destroy();
    header('location: /login.php');
  }
  // falls nicht, dann erneuere timestamp 
  else {
    $_SESSION['timestamp'] = time();
  }
} 