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

//dropdown menu mobile
const clickableMenus = document.querySelectorAll('[data-clickable-menu]');

clickableMenus.forEach(menu => {
  menu.addEventListener('click', () => {
    const expandingMenu = menu.querySelector('[data-expanding-menu]');
    const icon = menu.querySelector('img');
    expandingMenu.classList.toggle('hidden');
    icon.classList.toggle('rotate-90')
    
  })
})

//dropdown menu mobile
const desktopExpandableMenu = document.querySelectorAll('[data-desktop-expandable-menu]');

desktopExpandableMenu.forEach(menu => {
  menu.addEventListener('click', () => {
    const expandingMenu = menu.querySelector('ul');
    const icon = menu.querySelector('img');
    expandingMenu.classList.toggle('hidden')
    icon.classList.toggle('rotate-90')
  })
})