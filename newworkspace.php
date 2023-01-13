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
        <div class="form-wrapper">
          <div class="my-4">
            <label for="objectname">Name Workspace *</label>
            <input type="text" name="objectname" id="objectname" placeholder="Death Star">
          </div>

          <div class="my-4">
            <label class="block">Status *</label>
            <label for="status">Online</label>
            <input type="radio" name="status" id="online">
            <label class="ml-4 "for="status">Offline</label>
            <input type="radio" name="status" id="offline">
          </div>
          
          <div class="my-4">
            <label for="image">Bild-Url *</label>
            <input type="text" name="image" id="image" placeholder="www.thishousedoesnotexist.org">
          </div>
          
          <div class="my-4">
            <label for="description">Beschrieb Workspace *</label>
            <textarea class="h-40" type="textarea" name="description" id="description" placeholder="Such a big ball. But it has a main drawback deep inside..."></textarea>
          </div>
          
          <div class="my-4">
            <label for="address">Adresse *</label>
            <input type="text" name="address" id="address" placeholder="3C 321 Galaxy System">
          </div>

          <div class="my-4">
            <label for="price">Preis (CHF) / Tag *</label>
            <input type="number" name="price" id="price" placeholder="2436" min="0">
          </div>

          <div class="my-4">
            <label for="date">Verfügbarkeit *</label>
            <input type="date" name="date" id="date">
          </div>
          <div class="mt-8" id="btn-submit">
            <?php 
              $btnText ="Erstellen";
              $onClickFunction = "createWorkspace()";
              include 'src/components/buttons/primaryButtonSubmit.php';
            ?>
          </div>
        </div>
        <article id="message"></article>
      </section>
    </main>

    <!-- Footer -->
    <?php include 'src/layout/footer.php';?>
    <?php include 'src/layout/jsLinks.php';?>

  </body>
</html>
