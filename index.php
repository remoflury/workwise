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
      <section>
        <h1>Jetzt registrieren!</h1>
        <?php 
          $link = 'registration.php';
          $btnText = 'Registrieren';
          include 'src/components/buttons/primaryButton.php'
        ?>
      </section>
      <?php echo $_SESSION['userId']?>
      <!-- <h1 class="">Heading 1</h1>
      <h2>Heading 2</h2>
      <h3>Heading 3</h3>
      <h4>Heading 4</h4>
      <h5>Heading 5</h5>
      <h6>Heading 6</h6>

      <input type="text" name="test" id="test" class="border border-black focus-within:outline-none px-4 py-2">
      <button onclick="test()" class="border border-black px-4 py-2 ml-2">Submit</button> -->

      <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae mollitia porro iusto alias at. Pariatur cupiditate nobis doloribus consequuntur cumque. Eaque consectetur similique harum maxime! Ad nobis sint delectus quo?</p> -->
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>

    
  </body>
</html>
