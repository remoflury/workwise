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
        <h1>Registrieren</h1>

        <div class="">
          <div class="my-2">
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" placeholder="Chewbacca">
          </div>

          <div class="my-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="chew@bacca.tattoine">
          </div>
          
          <div class="my-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
          </div>

          <?php 
            $btnText ="Registrieren";
            $onClickFunction = "registration()";
            include 'src/components/buttons/primaryButtonSubmit.php';
          ?>
          <!-- <button onclick="registration()">Registrieren</button> -->


        </div>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>

  </body>
</html>
