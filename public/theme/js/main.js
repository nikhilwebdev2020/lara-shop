$('.close-icon').click(function(){
  $(this).closest('.banner-card').addClass('hide');
});

$('.toggleCard').click(function(){
  event.preventDefault();
  $('.banner-card').toggleClass('hide');
});

var owl1 = $('.owl-carousel');
owl1.owlCarousel({
    items:4,
    loop:true,
    margin:5,
    // autoplay:true,
    // autoplayTimeout:4000,
    // autoplayHoverPause:true,
    nav: true,
    responsiveClass: true,
    navText:["<div class='nav-btn prev-slide'><i class='fas fa-angle-left'></i></div>","<div class='nav-btn next-slide' ><i class='fas fa-angle-right'></i></div>"],
    dots: true,
    responsive: {
    0: {
      items: 1
    },

    600: {
      items: 2
    },

    1024: {
      items: 3
    },

    1366: {
      items: 4
    }
  }
});

// Testimonial
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("single-item");
  // var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  // for (i = 0; i < dots.length; i++) {
  //     dots[i].className = dots[i].className.replace(" active", "");
  // }
  slides[slideIndex-1].style.display = "block";
  // dots[slideIndex-1].className += " active";
}
