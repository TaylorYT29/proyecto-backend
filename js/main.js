const prevButton = document.getElementById("prevBtn");
const nextButton = document.getElementById("nextBtn");
const carouselSlide = document.querySelector(".carousel-slide");

let slideIndex = 0;
let timer;

prevButton.addEventListener("click", () => {
    moveSlide(-1);
    resetTimer();
});

nextButton.addEventListener("click", () => {
    moveSlide(1);
    resetTimer();
});

function moveSlide(n) {
    slideIndex += n;
    if (slideIndex < 0) {
        slideIndex = 24;
    } else if (slideIndex > 24) {
        slideIndex = 0;
    }

    const translateX = -slideIndex * 100;
    carouselSlide.style.transform = `translateX(${translateX}%)`;
}

function autoAdvance() {
    moveSlide(1);
    timer = setTimeout(autoAdvance, 3000); 
}

function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(autoAdvance, 3000);  
}

autoAdvance();
