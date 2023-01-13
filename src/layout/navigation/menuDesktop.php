<ul class="hidden lg:flex items-center justify-end gap-x-8 xl:gap-x-12 w-full text-white text-xl">
  <li class="relative "data-desktop-expandable-menu aria-expanded="false">
    <p class="flex gap-x-2 items-center cursor-pointer text-xl">Informationen<img class="h-[1.5em] transition" src="/src/assets/icons/chevron-right-white.png" alt="Design Element"></p>
    <ul class="bg-black p-4 absolute top-full left-0 hidden min-w-full">
      <li class="pt-2"><a href="dummysite.php">Vermieten</a></li>
      <li class="pt-2"><a href="dummysite.php">Mieten</a></li>
      <li class="pt-2"><a href="dummysite.php">FAQ</a></li>
    </ul>
  </li>
  <!-- wenn eingeloggt -->
  <?php if (isset($_SESSION['userId'])) { ?>
    <li class="relative "data-desktop-expandable-menu>
      <p class="flex gap-x-2 items-center cursor-pointer text-xl">Buchungen<img class="h-[1.5em] transition" src="/src/assets/icons/chevron-right-white.png" alt="Design Element"></p>
      <ul class="bg-black p-4 absolute top-full left-0 hidden min-w-full">
        <li class="pt-2"><a href="myrentals.php">Meine Vermietungen</a></li>
        <li class="pt-2"><a href="mybookings.php">Meine Buchungen</a></li>
      </ul>
    </li>
    <li>
      <p class="cursor-pointer text-xl text-center"><a href="myworkspaces.php">Meine Inserate</a></p>
    </li>
    <li>
      <p class="cursor-pointer text-xl text-center"><a href="newworkspace.php">Inserat hinzufügen</a></p>
    </li>
  <?php } else { ?>
    <li>
      <p class="cursor-pointer text-xl text-center"><a href="dummysite.php">Kontakt</a></p>
    </li>
  <?php } ?>
  <li>
    <?php 
      if (isset($_SESSION['userId'])) {
        $btnText = 'Logout';
        $onClickFunction = 'logout()';
        include 'src/components/buttons/primaryButtonSubmit.php';
      } else {
        $link = 'login.php';
        $btnText = 'Login';
        include 'src/components/buttons/primaryButton.php';
      }
    ?>
  </li>
</ul>