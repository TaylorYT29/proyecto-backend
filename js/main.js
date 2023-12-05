/*
This file handles the functionality of a image carousel. It includes
functions to move between slides manually using navigation buttons and automatically
through a timer. The file ensures a smooth transition between slides, looping back to
the first slide after reaching the last one. The auto-advance feature advances to the
next slide every 3000 milliseconds (3 seconds).
*/

// DOM elements and variables initialization
const prevButton = document.getElementById("prevBtn");
const nextButton = document.getElementById("nextBtn");
const carouselSlide = document.querySelector(".carousel-slide");

let slideIndex = 0; // Represents the current slide index
let timer; // Timer for auto-advancing slides

// Event listeners for manual navigation using buttons
prevButton.addEventListener("click", () => {
    moveSlide(-1);
    resetTimer();
});

nextButton.addEventListener("click", () => {
    moveSlide(1);
    resetTimer();
});

// Function to move to the next or previous slide
function moveSlide(n) {
    slideIndex += n;
    if (slideIndex < 0) {
        slideIndex = 11;
    } else if (slideIndex > 11) {
        slideIndex = 0;
    }

    // Calculate the translation for smooth slide transition
    const translateX = -slideIndex * 100;
    carouselSlide.style.transform = `translateX(${translateX}%)`;
}

// Function for auto-advancing slides at normal intervals
function autoAdvance() {
    moveSlide(1);
    timer = setTimeout(autoAdvance, 3000); 
}

// Function to reset the auto-advance timer
function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(autoAdvance, 3000);  
}

autoAdvance();
