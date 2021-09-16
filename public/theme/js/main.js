$(".close-icon").click(function () {
  $(this).closest(".banner-card").addClass("hide");
});

$(".toggleCard").click(function () {
  event.preventDefault();
  $(".banner-card").toggleClass("hide");
});

var owl1 = $(".owl-carousel");
owl1.owlCarousel({
  items: 4,
  loop: true,
  margin: 5,
  // autoplay:true,
  // autoplayTimeout:4000,
  // autoplayHoverPause:true,
  nav: true,
  responsiveClass: true,
  navText: [
    "<div class='nav-btn prev-slide'><i class='fas fa-angle-left'></i></div>",
    "<div class='nav-btn next-slide' ><i class='fas fa-angle-right'></i></div>",
  ],
  dots: true,
  responsive: {
    0: {
      items: 1,
    },

    480: {
      items: 1,
    },

    768: {
      items: 3,
    },

    1024: {
      items: 3,
    },

    1366: {
      items: 4,
    },
  },
});

// Testimonial
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("single-item");

  if (slides.length > 0) {
    // var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    // for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" active", "");
    // }
    slides[slideIndex - 1].style.display = "block";
    // dots[slideIndex-1].className += " active";
  }
}

// Get the modal
var modal = document.getElementById("loginModal");
var dynamicModal = document.getElementById("dynamicModal");

// Get the button that opens the modal
var btn = document.getElementById("loginBtn");
var btns = document.getElementsByClassName("add-to-cart");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
btn.onclick = function (event) {
  event.preventDefault();
  modal.style.display = "block";
};

for (i = 0; i < btns.length; i++) {
  btns[i].onclick = function(event) {
    event.preventDefault();
    dynamicModal.style.display = "block";
  }
}

// When the user clicks on <span> (x), close the modal
for (i = 0; i < spans.length; i++) {
  spans[i].onclick = function () {
    modal.style.display = "none";
    dynamicModal.style.display = "none";
  };
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == dynamicModal) {
    dynamicModal.style.display = "none";
  }
};

// Update quantity
function changeQuantity(type, target) {
  const inp = document.getElementById(target);
  let val = inp.value;
  if ( type == 'plus' ) {
    inp.value = '';
    inp.value = parseInt(val) + 1;
  }else{
    inp.value = '';
    inp.value = parseInt(val) > 1 ? parseInt(val) - 1 : 1;
  }
}

let change_qty = document.getElementsByClassName('change_qty');
for (var i = 0; i < change_qty.length; i++) {
  change_qty[i].addEventListener('click', function(event){
    event.preventDefault();
    const type = this.getAttribute('type');
    const target = this.getAttribute('data-target');
    window.onload = changeQuantity(type, target);
  });
}

function clearActive(element) {
    for (i = 0; i < element.length; i++) {
        element[i].classList.remove('active');
    }
}

const categoryitems = document.getElementsByClassName('category-item');
const subcategories = document.getElementsByClassName('subcats');
const categories_list = document.getElementById("categories_list");
const catTitles = document.getElementsByClassName("catTitle");
const closesubcats = document.getElementsByClassName("close-subcats");

for (i = 0; i < categoryitems.length; i++) {
  categoryitems[i].addEventListener("mouseenter", function(event){
    event.preventDefault();
    const subcatid = this.getAttribute('subcatid');
    clearActive(subcategories);
    const elem = document.getElementById("subcats-"+subcatid);
    elem.classList.add('active');
  })
}

for (i = 0; i < categoryitems.length; i++) {
  categoryitems[i].addEventListener("click", function(event){
    event.preventDefault();
  })
}

for (i = 0; i < closesubcats.length; i++) {
  closesubcats[i].addEventListener("click", function(event){
    clearActive(subcategories);
  });
}

// When the user clicks anywhere outside of the list, close it
window.onclick = function (event) {
  if ( event.target.classList.contains("catTitle") == false && event.target.closest("#categories_list") == null ) {
    clearActive(subcategories);
  }
};
