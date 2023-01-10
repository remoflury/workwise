<footer class="">
  <div class="container py-4">
    <p class="">Footer</p>

    <?php 
      if (isset($_SESSION['userId'])) {
        $btnText = 'Logout';
        $onClickFunction = 'logout()';
        include 'src/components/buttons/primaryButtonSubmit.php';
      }
    ?>
  </div>
</footer>