<?php 
  require 'backend/auth.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <!-- Meta Tags -->
  <?php include 'src/layout/htmlHead/metaTags.php';?>

  <!-- Links (CSS, JS usw.) -->
  <?php include 'src/layout/htmlHead/htmlLinks.php';?>


  <title>Workwise | Dummy</title>
</head>
  <body class="min-h-screen">

    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Das ist eine Dummyseite</h1>
        <p class="lead">Schenke dieser Seite am besten keine Beachtung. Wookies haben hier eigentlich eh nichts zu suchen.</p>
        <p class="lead">Diese Seite hat keine Funktionalität und ist deshalb nur ein Platzhalter.</p>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <?php include 'src/layout/jsLinks.php';?>

  </body>
</html>
