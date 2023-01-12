<?php 

if (!isset($_POST['submit'])) {
  header('location: /');
  exit();
}

session_start();
session_unset();
session_destroy();

echo '{
  "error": false,
  "message": "Erfolgreich ausgeloggt"
}';
