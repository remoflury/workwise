<nav class="bg-black py-3 fixed z-50 w-full">
  <div class="container flex justify-between items-center">
    <!-- Logo -->
    <a href="/" title="zur Startseite">
      <img class="w-16 sm:w-20 md:w-24" src="/src/assets/logo/Logo WorkWise ohne Schrift_v2.svg" alt="Zur Startseite">
    </a>

    <!-- Hamburger -->
    <button 
      id="hamburger"
      class="w-12 h-8 relative flex flex-col justify-between"
      aria>
      <?php include_once 'hamburger.php' ?>
    </button>

    <!-- Menu Mobile -->
    <div 
      id="menu-mobile"
      class="absolute inset-0 h-screen w-screen bg-white top-full translate-x-full transition delay-100 duration-300">
      <ul class="container w-full h-full flex flex-col gap-4 items-center justify-center">
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Informationen<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Vermieten</a></li>
            <li class="text-xl"><a href="/">Mieten</a></li>
            <li class="text-xl"><a href="/">FAQ</a></li>
          </ul>
        </li>
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Buchungen<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Messages</a></li>
            <li class="text-xl"><a href="/">Meine Vermietungen</a></li>
            <li class="text-xl"><a href="/">Meine Buchungen</a></li>
            <li class="text-xl"><a href="/">Abrechnung</a></li>
          </ul>
        </li>
        <li data-clickable-menu>
          <p class="flex gap-x-4 items-center text-xl font-semibold cursor-pointer">Profil<img class="h-[2em] transition" src="/src/assets/icons/chevron-right.png" alt="Design Element"></p>
          <ul class="hidden pl-4 pb-2" data-expanding-menu>
            <li class="text-xl"><a href="/">Profileinstellungen</a></li>
            <li class="text-xl"><a href="/">Zahlungsmittel</a></li>
            <li class="text-xl"><a href="/">Kontoverbindung</a></li>
            <li class="text-xl"><a href="/">Meine Inserate</a></li>
          </ul>
        </li>
        <li class="text-xl font-semibold "><a href="/">Inserat hinzufügen</a></li>
        <li class="text-xl font-semibold mt-4"><?php $link = "/";$btnText = "Kontakt"; include(__DIR__.'/../../components/buttons/primaryButton.php');?></li>
      </ul>
    </div>
  </div>
</nav>