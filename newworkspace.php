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


  <title>Workwise | Inserat hinzufügen</title>
</head>
  <body class="min-h-screen">

    <!-- Header -->
    <?php include 'src/layout/header.php';?>

    <main class="container">
      <!-- Hier kommt der Main Content -->
      <section>
        <h1>Inserat erstellen</h1>
        <div class="">
          <div class="my-2">
            <label for="nameobject">Name Mietobjekt</label>
            <input type="text" name="nameobject" id="nameobject" placeholder="Death Star">
          </div>

          <div class="my-2">
            <label for="status">Online</label>
            <input type="radio" name="status" id="online" >
            <label for="status">Offline</label>
            <input type="radio" name="status" id="offline" >
          </div>
          
          <div class="my-2">
            <label for="image">Bild-Url</label>
            <input type="text" name="image" id="image">
          </div>
          
          <div class="my-2">
            <label for="description">Beschrieb Workspace</label>
            <textarea class="h-40" type="textarea" name="description" id="description" placeholder="Such a big ball. But it has a main drawback deep inside..."></textarea>
          </div>
          
          <div class="my-2">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" placeholder="3C 321 Galaxy System">
          </div>

          <div class="my-2">
            <label for="price">Preis (CHF) / Tag</label>
            <input type="number" name="price" id="price" placeholder="2436" min="0">
          </div>

          <div class="my-2">
            <label for="date">Verfügbarkeit</label>
            <input type="date" name="date" id="date">
          </div>

          <?php 
            $btnText ="Erstellen";
            $onClickFunction = "createWorkspace()";
            include 'src/components/buttons/primaryButtonSubmit.php';
          ?>
        </div>
        <article id="message"></article>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>

  </body>
</html>
