<?php 

// check, if site is not accessed with submit button
if (!isset($_POST['submit'])) {
  echo '{
    "message": "Bitte auf richtigem Weg hierherkommen",
    "error": "no submit set",
    "header": "/_vorlage.php",
    "data": null
  }';
}

echo '{
  "error": "none"
}';