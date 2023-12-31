document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("fade");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.opacity = "0";
        }

        currentIndex++;
        if (currentIndex > slides.length) {
            currentIndex = 1;
        }

        slides[currentIndex - 1].style.opacity = "1";
        setTimeout(showSlides, 5000); // Change d'image toutes les 5 secondes
    }
});
