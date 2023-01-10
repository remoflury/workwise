<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <!-- Meta Tags -->
  <?php include 'src/layout/htmlHead/metaTags.php';?>

  <!-- Links (CSS, JS usw.) -->
  <?php include 'src/layout/htmlHead/htmlLinks.php';?>

  <title>Workwise | Home</title>
</head>
  <body class="min-h-screen">
    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Wenn nicht eingeloggt -->
      <?php if (!isset($_SESSION['userId'])) { ?>
        <section>
          <h1>Welcome to Workwise</h1>
          <div class="">
            <?php 
              $link = 'registration.php';
              $btnText = 'Registrieren';
              include 'src/components/buttons/primaryButton.php'
            ?>
          </div>
          <div class="mt-4">
            <?php 
              $link = 'login.php';
              $btnText = 'Login';
              include 'src/components/buttons/primaryButton.php'
            ?>

            </div>
        </section>
      <?php } ?>

      <!-- Wenn eingeloggt -->
      <?php if (isset($_SESSION['userId'])) { ?>
        <section>
          <h1>Workwise</h1>
          <p>Hallo <?php echo $_SESSION['username']?></p>
        </section>
      <?php } ?>

    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>

    
  </body>
</html>
