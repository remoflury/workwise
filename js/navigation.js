const hamburgerBtn = document.querySelector('#hamburger');
const navElem = document.querySelector('nav');
const headerElem = document.querySelector('header');
const menuMobileElem = document.querySelector('#menu-mobile');
// const hamburgerSpans = hamburgerBtn.querySelectorAll('span');

// toggling open Menu
hamburgerBtn.addEventListener('click', () => {
  hamburgerBtn.classList.toggle('menu-open');
  menuMobileElem.classList.toggle('menu-open');
  document.body.classList.toggle('overflow-y-hidden');
})

// set offset height for menu elem
function setMenuOffset() {
  const heightNavElem = navElem.offsetHeight + 30;
  headerElem.style.marginBottom = `${heightNavElem}px`;
  menuMobileElem.style.height = `calc(100vh - ${heightNavElem}px)`;
}

setMenuOffset();
window.addEventListener('resize', setMenuOffset);