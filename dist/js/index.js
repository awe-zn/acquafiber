const modelos = document.querySelectorAll('[data-modelo]');
const detalhes = document.querySelectorAll('[data-detalhe]');

modelos.forEach(i => {
  i.addEventListener('click', handleClick);
});

function handleClick({currentTarget}) {
  modelos.forEach(i => {
    i.classList.remove('is-active');
  });
  currentTarget.classList.add('is-active');
  detalhes.forEach(i => {
    if(i.id.replace('detalhe-', '') === currentTarget.id.replace('modelo-', '')) {
      i.classList.remove('d-none');
    } else {
      i.classList.add('d-none');
    }
  });
  
}

const swiper = new Swiper('.carrossel-linhas', {
  slidesPerView: "auto",
  spaceBetween: 24,
  breakpoints: {
    992: {
      enabled: false,
    }
  }
});

const swiper2 = new Swiper('.carrossel-tamanhos', {
  navigation: {
    nextEl: '.swiper-next',
    prevEl: '.swiper-prev',
  },
  slidesPerView: 'auto',
  spaceBetween: 19,
});