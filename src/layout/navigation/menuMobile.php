<div 
      id="menu-mobile"
      class="lg:hidden absolute inset-0 h-screen w-screen bg-white top-full translate-x-full transition delay-100 duration-300">
      <ul class="container w-full h-full flex flex-col gap-4 items-center justify-center">
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Informationen<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Vermieten</a></li>
            <li class="text-xl"><a href="/">Mieten</a></li>
            <li class="text-xl"><a href="/">FAQ</a></li>
          </ul>
        </li>
        <!-- wenn eingeloggt -->
        <?php if (isset($_SESSION['userId'])) { ?>
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Buchungen<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Messages</a></li>
            <li class="text-xl"><a href="myrentals.php">Meine Vermietungen</a></li>
            <li class="text-xl"><a href="mybookings.php">Meine Buchungen</a></li>
            <li class="text-xl"><a href="/">Abrechnung</a></li>
          </ul>
        </li>
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Profil<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Profileinstellungen</a></li>
            <li class="text-xl"><a href="/">Zahlungsmittel</a></li>
            <li class="text-xl"><a href="/">Kontoverbindung</a></li>
            <li class="text-xl"><a href="myworkspaces.php">Meine Inserate</a></li>
          </ul>
        </li>
        <li class="text-xl font-semibold "><a href="newworkspace.php">Inserat hinzuf??gen</a></li>
        <?php } else { ?>
          <li>
            <p class="text-xl font-semibold"><a href="contact.php">Kontakt</a></p>
          </li>
        <?php } ?>
        <li class="text-xl font-semibold mt-4">
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
    </div>