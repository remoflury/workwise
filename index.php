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

  <title>Workwise | Home</title>
</head>
  <body class="min-h-screen">
    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <?php if (!isset($_SESSION['userId'])) { ?>
        <!-- Wenn nicht eingeloggt -->
        <section>
          <h1 class="mb-12">Welcome to Workwise</h1>
          <p class="lead mb-12 md:max-w-3/4 xl:max-w-1/2">Hast du ein Heimbüro, das du tagsüber nicht brauchst? Oder suchst du ein Büro, dass du schnell und einfach tageweise mieten kannst? Dann registriere dich jetzt bei Workwise.</p>
          <div class="flex flex-wrap gap-12 justify-start">
            <?php 
              $link = 'registration.php';
              $btnText = 'Registrieren';
              include 'src/components/buttons/primaryButton.php'
            ?>

            </div>
        </section>
      <?php } ?>

      <?php if (isset($_SESSION['userId'])) { ?>
        <!-- Wenn eingeloggt -->
        <section>
          <h1>Workwise!</h1>
          <p class="text-3xl md:text-4xl xl:text-5xl font-bold opacity-60">Hallo <?php echo $_SESSION['username']?></p>
          <input type="hidden" name="userid" id="userId" value="<?php echo $_SESSION['userId']?>">
        </section>
      <?php } ?>

      <section id="workspaces" class="flex flex-wrap gap-8 lg:gap-12 items-start justify-center">
        <h2>Verfügbare Workspaces</h2>
      </section>

    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <?php include 'src/layout/jsLinks.php';?>
    <script>showAllWorkspaces()</script>
    
  </body>
</html>
