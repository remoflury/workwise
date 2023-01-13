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


  <title>Workwise | Login</title>
</head>
  <body class="min-h-screen">

    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Login</h1>

        <div class="form-wrapper">

          <div class="my-4">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" placeholder="chew@bacca.tattoine">
          </div>
          
          <div class="my-4">
            <label for="password">Password *</label>
            <input type="password" name="password" id="password" placeholder="min. 8 Zeichen">
          </div>
          <div class="mt-8">
            <?php 
              $btnText ="Login";
              $onClickFunction = "login()";
              include 'src/components/buttons/primaryButtonSubmit.php';
            ?>
          </div>
        </div>
        <article id="message"></article>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>

  </body>
</html>
