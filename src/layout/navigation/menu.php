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
        <li class="text-xl font-semibold "><a href="/">Informationen</a></li>
        <li class="text-xl font-semibold "><a href="/">Buchungen</a></li>
        <li class="text-xl font-semibold "><a href="/">Profil</a></li>
        <li class="text-xl font-semibold "><a href="/">Inserat hinzufügen</a></li>
        <li class="text-xl font-semibold mt-4"><?php $link = "/";$btnText = "Kontakt"; include(__DIR__.'/../../components/buttons/primaryButton.php');?></li>
      </ul>
    </div>
  </div>
</nav>