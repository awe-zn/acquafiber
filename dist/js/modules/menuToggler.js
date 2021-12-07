export default function initMenuToggler() {
  const menu = document.querySelector('#menu-toggler');
  menu.addEventListener('click', handleClick);

  function handleClick({target}) {
    target.classList.toggle('is-active');
  }
}