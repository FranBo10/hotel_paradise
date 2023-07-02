const buttons = document.querySelectorAll(".button");
const buttons2 = document.querySelectorAll(".button2");
const button = document.querySelector("button.button3");
const services = document.querySelector(".services");
const footer = document.querySelector(".footer");
const caption = document.querySelector(".carousel-caption");
const logo = document.querySelector(".logo");
const cards = document.querySelectorAll(".card");
const items = document.querySelectorAll(".nav-link");

buttons.forEach(button => {
  button.addEventListener("mouseover", () => {
    button.classList.add("active");
    caption.classList.add("active");
    buttons2.forEach(button2 => button2.classList.add("active"))
    items.forEach(item => item.classList.add("active"))
    logo.classList.add("active");
    cards.forEach(card => card.classList.add("active"));
    services.style.backgroundImage = 'url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 80 80\' width=\'80\' height=\'80\'%3E%3Cpath fill=\'%233d6bc6\' fill-opacity=\'0.4\' d=\'M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\'%3E%3C/path%3E%3C/svg%3E")';
  });

  button.addEventListener("mouseout", () => {
    button.classList.remove("active");
    caption.classList.remove("active");
    logo.classList.remove("active");
    buttons2.forEach(button2 => button2.classList.add("active"))
    items.forEach(item => item.classList.remove("active"));
    cards.forEach(card => card.classList.remove("active"));
    services.style.backgroundImage = "url('data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 80 80\" width=\"80\" height=\"80\"%3E%3Cpath fill=\"%23ffd700\" fill-opacity=\"0.4\" d=\"M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\"/%3E%3C/svg%3E')";
  });
});

buttons2.forEach(button2 => {
    button2.addEventListener("mouseover", () => {
      button2.classList.add("active");
      caption.classList.add("active");
      items.forEach(item => item.classList.add("active"))
      logo.classList.add("active");
      cards.forEach(card => card.classList.add("active"));
      services.style.backgroundImage = 'url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 80 80\' width=\'80\' height=\'80\'%3E%3Cpath fill=\'%233d6bc6\' fill-opacity=\'0.4\' d=\'M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\'%3E%3C/path%3E%3C/svg%3E")';
    });
  
    button2.addEventListener("mouseout", () => {
      button2.classList.remove("active");
      caption.classList.remove("active");
      logo.classList.remove("active");
      items.forEach(item => item.classList.remove("active"));
      cards.forEach(card => card.classList.remove("active"));
      services.style.backgroundImage = "url('data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 80 80\" width=\"80\" height=\"80\"%3E%3Cpath fill=\"%23ffd700\" fill-opacity=\"0.4\" d=\"M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\"/%3E%3C/svg%3E')";
    });
  });

  button.addEventListener("mouseover", () => {
    button.classList.add("active");
    caption.classList.add("active");
    items.forEach(item => item.classList.add("active"));
    logo.classList.add("active");
    cards.forEach(card => card.classList.add("active"));
    footer.classList.add(".active");
    footer.style.backgroundImage = "url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 80 80\' width=\'80\' height=\'80\'%3E%3Cpath fill=\'%23ffd700\' fill-opacity=\'0.4\' d=\'M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\'/%3E%3C/svg%3E')";

  });
  
  
button.addEventListener("mouseout", () => {
  button.classList.remove("active");
  caption.classList.remove("active");
  logo.classList.remove("active");
  items.forEach(item => item.classList.remove("active"));
  cards.forEach(card => card.classList.remove("active"));
  footer.style.backgroundImage = "url('data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 80 80\" width=\"80\" height=\"80\"%3E%3Cpath fill=\"%2342aab5\" fill-opacity=\"0.4\" d=\"M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z\"/%3E%3C/svg%3E')";
});
  
  
  
  
  
  
  


function cambiarEstadoElemento() {
    let elemento = document.querySelector('.flags-active');
    let flags =  document.querySelector('.flags');
    if (window.innerWidth < 990) {
      elemento.style.display = 'none';
    } else {
      flags.style.display = 'block';
    }
  }

  window.addEventListener('load', cambiarEstadoElemento);
  window.addEventListener('resize', cambiarEstadoElemento);

  const input = document.getElementById('placeholder');

input.addEventListener('focus', () => {
  input.removeAttribute('placeholder');
});

input.addEventListener('blur', () => {
  input.setAttribute('placeholder', 'Inserez votre email');
});



// $(document).ready(function() {
//     const nav = document.querySelector(".nav-link");
//     const navCollapse = document.querySelector(".navbar-collapse");

//     let isNavCollapsed = true;

//     nav.addEventListener("click", function() {
//       if (isNavCollapsed) {
//         navCollapse.classList.add("show");
//       } else {
//         navCollapse.classList.remove("show");
//       }
//       isNavCollapsed = !isNavCollapsed;
//     });
//   });



// const nav = $(".nav-link");
// const navCollapse = $(".navbar-collapse");

// nav.on("click", function() {
//   navCollapse.collapse("hide");
// });