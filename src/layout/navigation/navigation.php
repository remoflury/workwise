<nav class="bg-black py-3 lg:py-5 fixed z-50 w-full">
  <div class="container flex justify-between gap-x-8 items-center">
    <!-- Logo -->
    <a href="/" title="zur Startseite">
      <img class="w-16 sm:w-20 md:w-24" src="/src/assets/logo/logo-neu-ohneschrift.svg" alt="Zur Startseite">
    </a>

    <!-- Hamburger -->
    <button 
      id="hamburger"
      class="lg:hidden w-12 h-8 relative flex flex-col justify-between"
      aria-expanded="false">
      <?php include_once 'hamburger.php' ?>
    </button>

    <!-- Menu Mobile -->
    <?php include 'menuMobile.php';?>
    
    <!-- Menu Desktop -->
    <?php include 'menuDesktop.php';?>
  </div>
</nav>