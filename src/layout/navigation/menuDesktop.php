<ul class="hidden lg:flex items-center justify-end gap-x-8 xl:gap-x-12 w-full text-white text-xl">
  <li class="relative "data-desktop-expandable-menu aria-expanded="false">
    <p class="flex gap-x-2 items-center cursor-pointer text-xl">Informationen<img class="h-[1.5em] transition" src="/src/assets/icons/chevron-right-white.png" alt="Design Element"></p>
    <ul class="bg-black p-4 absolute top-full left-0 hidden min-w-full">
      <li><a href="/">Vermieten</a></li>
      <li class="pt-2"><a href="/">Mieten</a></li>
      <li class="pt-2"><a href="/">FAQ</a></li>
    </ul>
  </li>
  <li class="relative "data-desktop-expandable-menu>
    <p class="flex gap-x-2 items-center cursor-pointer text-xl">Buchungen<img class="h-[1.5em] transition" src="/src/assets/icons/chevron-right-white.png" alt="Design Element"></p>
    <ul class="bg-black p-4 absolute top-full left-0 hidden min-w-full">
      <li><a href="/">Messages</a></li>
      <li class="pt-2"><a href="/">Meine Vermietungen</a></li>
      <li class="pt-2"><a href="/">Meine Buchungen</a></li>
      <li class="pt-2"><a href="/">Abrechnungen</a></li>
    </ul>
  </li>
  <li class="relative "data-desktop-expandable-menu>
    <p class="flex gap-x-2 items-center cursor-pointer text-xl">Profil<img class="h-[1.5em] transition" src="/src/assets/icons/chevron-right-white.png" alt="Design Element"></p>
    <ul class="bg-black p-4 absolute top-full left-0 hidden min-w-full">
      <li><a href="/">Profileinstellungen</a></li>
      <li class="pt-2"><a href="/">Zahlungsmittel</a></li>
      <li class="pt-2"><a href="/">Kontoverbindung</a></li>
      <li class="pt-2"><a href="/">Meine Inserate</a></li>
    </ul>
  </li>
  <li class="relative "data-desktop-expandable-menu>
    <p class="cursor-pointer text-xl"><a href="newworkspace.php">Inserat hinzufügen</a></p>
  </li>
  <li>
    <?php 
      $link = '/';
      $btnText = 'Kontakt';
      include './src/components/buttons/primaryButton.php';
    ?>
  </li>
</ul>