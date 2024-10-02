// observes where on page user are and adds animation when content is in view
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const stack = entry.target.getElementsByClassName('stack');

        // console.log(stack);
    
        if (entry.isIntersecting) {
          for (element of stack) {
            element.classList.add('stack-animation');
          }
          return;
        }
    
        for (element of stack) {
          element.classList.remove('stack-animation');
        }
      });
  });

observer.observe(document.querySelector('.skills-content')); 

// highlight active menu link when user scroll by its content
const sections = document.querySelectorAll("section[id]");

window.addEventListener("scroll", navHighLighter);

function navHighLighter () {
  let scrollY = window.pageYOffset;

  sections.forEach(current => {
    const sectionHeight = current.offsetHeight;

    const sectionTop =  (current.getBoundingClientRect().top + window.pageYOffset) - 50;
    sectionId = current.getAttribute("id");

    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      document.querySelector(".nav a[href*=" + sectionId + "]").classList.add("active");
    } else {
      document.querySelector(".nav a[href*=" + sectionId + "]").classList.remove("active");
    }
  })
}

// smooth scrolling while clicking on link
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: "smooth"
    });
  });
});


// slideshow pictures
let slide = "";
let modal = "";
let slideNames = document.getElementsByClassName('hover-shadow');
for(slideName of slideNames) {
  slideName.addEventListener('click', function getSlideName(e) {
    slide = e.target.id;
    modal = e.target.id + "-modal";

    openModal();
    currentSlide(1);
  });
  
}

function openModal() {
  document.getElementById(modal).style.display = "block";
  const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
  const body = document.body;
  body.style.position = 'fixed';
  body.style.top = `-${scrollY}`;
}

// Close the Modal
function closeModal() {
  document.getElementById(modal).style.display = "none";
  const body = document.body;
  const scrollY = body.style.top;
  body.style.position = '';
  body.style.top = '';
  window.scrollTo(0, parseInt(scrollY || '0') * -1);
}

window.addEventListener('scroll', () => {
  document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
});

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName(slide);
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}


// Hamburger menu

let menu = document.querySelector('.menu');
let aside = document.querySelector('.aside');
let hamburger = document.querySelector('.fa-bars');
let exitIcon = document.querySelector('.fa-times');
let colorContainer = document.querySelector('.color-btn-container');
let borderHr = document.querySelector('.border-hr');

function toggleMenu () {
  aside.classList.toggle('aside-active');
  hamburger.classList.toggle('hide');
  exitIcon.classList.toggle('hide');
  menu.classList.toggle('exit');
  colorContainer.classList.toggle('hide');
  borderHr.classList.toggle('hide');
}

menu.addEventListener("click", toggleMenu);

// Close menu if user click outside
document.addEventListener('click', function clickOutsideMenu (e){
  if (!aside.contains(e.target) && !menu.contains(e.target)) {
    aside.classList.remove('aside-active');
    exitIcon.classList.add('hide');
    hamburger.classList.remove('hide');
    menu.classList.remove('exit');
    colorContainer.classList.remove('hide');
    borderHr.classList.remove('hide');
  }
})

// Change theme

let redBtn = document.querySelector('#red-btn');
let redBtnBorder = document.querySelector('.border-red');
let orangeBtn = document.querySelector('#orange-btn');
let orangeBtnBorder = document.querySelector('.border-orange');

redBtn.addEventListener('click', function () {
  document.documentElement.style.setProperty('--theme', '#DE1B37');
  document.documentElement.style.setProperty('--bg-color', '#EAEBED');
  document.documentElement.style.setProperty('--bg-aside', 'white');
  document.documentElement.style.setProperty('--text', 'black');
  document.documentElement.style.setProperty('--alt-text', 'black');
  orangeBtnBorder.classList.add('hide');
  redBtnBorder.classList.remove('hide');
  document.querySelector('.logo').src= 'img/pontus-logo-red.svg';
})

orangeBtn.addEventListener('click', function () {
  document.documentElement.style.setProperty('--theme', '#F54A05');
  document.documentElement.style.setProperty('--bg-color', '#151515');
  document.documentElement.style.setProperty('--bg-aside', '#222222');
  document.documentElement.style.setProperty('--text', '#fff');
  document.documentElement.style.setProperty('--alt-text', '#fff');
  redBtnBorder.classList.add('hide');
  orangeBtnBorder.classList.remove('hide');
  document.querySelector('.logo').src= 'img/pontus-logo-orange.svg';
})





