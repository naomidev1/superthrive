let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    slides[i].classList.remove("zoom-in");
  }
  slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].classList.add("zoom-in");
}

setInterval(() => {
  plusSlides(1);
}, 9000);

// end of slide show
// css animation 
document.addEventListener("DOMContentLoaded", function() {
  const aboutSection = document.querySelector(".aboutSection");
  const left = document.querySelector(".aboutSection .left");
  const right = document.querySelector(".aboutSection .right");
  const boxes = document.querySelectorAll(".aboutSection .boxes .box");

  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function animateElements() {
    if (isInViewport(aboutSection)) {
      left.style.opacity = 1;
      right.style.opacity = 1;
      boxes.forEach((box, index) => {
        setTimeout(() => {
          box.style.opacity = 1;
        }, 300 * index); // Delay each box by 300ms
      });
      // Remove event listener once animations have been triggered
      window.removeEventListener("scroll", animateElements);
    }
  }

  window.addEventListener("scroll", animateElements);
});

document.addEventListener("DOMContentLoaded", function() {
  var galleryItems = document.querySelectorAll(".gallery-item");
  var currentIndex = 0;

  // Display first image and description
  showImage(currentIndex);

  // Function to show image and description
  function showImage(index) {
      // Hide all images and descriptions
      galleryItems.forEach(function(item) {
          item.style.display = "none";
      });

      // Show the selected image and description
      galleryItems[index].style.display = "block";
  }

  // Function to handle next image
  function nextImage() {
      currentIndex++;
      if (currentIndex >= galleryItems.length) {
          currentIndex = 0; // Loop back to the first image
      }
      showImage(currentIndex);
  }

  // Function to handle previous image
  function prevImage() {
      currentIndex--;
      if (currentIndex < 0) {
          currentIndex = galleryItems.length - 1; // Go to the last image
      }
      showImage(currentIndex);
  }

  // Show next image on click
  document.getElementById("next").addEventListener("click", nextImage);

  // Show previous image on click
  document.getElementById("prev").addEventListener("click", prevImage);
});
