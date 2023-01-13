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


  <title>Workwise | Meine Inserate</title>
</head>
  <body class="min-h-screen">

    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Meine Inserate</h1>
        <div class="flex flex-wrap gap-8 lg:gap-12 items-start justify-center" id="my-workspaces"></div>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <?php include 'src/layout/jsLinks.php';?>
    <script>showMyWorkspaces()</script>

  </body>
</html>
