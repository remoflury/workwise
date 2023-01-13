<?php 
  require 'backend/auth.php';
  if (!$_SESSION['userId']) {
    header('location: /');
  }
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <!-- Meta Tags -->
  <?php include 'src/layout/htmlHead/metaTags.php';?>

  <!-- Links (CSS, JS usw.) -->
  <?php include 'src/layout/htmlHead/htmlLinks.php';?>


  <title>Workwise | Meine Vermietungen</title>
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
      <section id="my-rentals-wrapper"></section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <?php include 'src/layout/jsLinks.php';?>
    <script>showMyRentals()</script>
  </body>
</html>
