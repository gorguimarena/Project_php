/*let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("carousel-slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}

function moveSlide(n) {
    let slides = document.getElementsByClassName("carousel-slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex += n;
    if (slideIndex > slides.length) {slideIndex = 1}
    if (slideIndex < 1) {slideIndex = slides.length}
    slides[slideIndex-1].style.display = "block";
}*/
let slideIndex = 0;
let slides = document.getElementsByClassName("carousel-slide");
showSlides();

function showSlides() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active", "prev", "next");
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].classList.add("active");

    // Ajouter les classes prev et next
    if (slideIndex > 1) {
        slides[slideIndex-2].style.display = "block";
        slides[slideIndex-2].classList.add("prev");
    } else {
        slides[slides.length - 1].style.display = "block";
        slides[slides.length - 1].classList.add("prev");
    }

    if (slideIndex < slides.length) {
        slides[slideIndex].style.display = "block";
        slides[slideIndex].classList.add("next");
    } else {
        slides[0].style.display = "block";
        slides[0].classList.add("next");
    }

    setTimeout(showSlides, 6000); // Change image every 5 seconds
}

function moveSlide(n) {
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active", "prev", "next");
        slides[i].style.display = "none";
    }
    slideIndex += n;
    if (slideIndex > slides.length) {slideIndex = 1}
    if (slideIndex < 1) {slideIndex = slides.length}
    slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].classList.add("active");

    // Ajouter les classes prev et next
    if (slideIndex > 1) {
        slides[slideIndex-2].style.display = "block";
        slides[slideIndex-2].classList.add("prev");
    } else {
        slides[slides.length - 1].style.display = "block";
        slides[slides.length - 1].classList.add("prev");
    }

    if (slideIndex < slides.length) {
        slides[slideIndex].style.display = "block";
        slides[slideIndex].classList.add("next");
    } else {
        slides[0].style.display = "block";
        slides[0].classList.add("next");
    }
}

