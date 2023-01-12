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


  <title>Workwise | Workspace mieten</title>
</head>
  <body class="min-h-screen">

    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Workspace mieten</h1>
        <input type="hidden" name="workspace-id" id="workspace-id" value="<?php echo $_GET['workspaceId'] ?>">
      </section>
      <section id="workspace"></section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <script src="js/rentWorkspace.js"></script>
    <script>rentWorkspace()</script>
  </body>
</html>
