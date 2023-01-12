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
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Meine Vermietungen</h1>
        <input type="hidden" name="userId" id="user-id" value="<?php echo $_SESSION['userId'] ?>">
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <script src="js/showMyRentals.js"></script>
    <script>showMyRentals()</script>
  </body>
</html>