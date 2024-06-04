var slideIndex = 1;

function slideShow() {
    var slides = document.getElementsByClassName('slide');
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    var dots = document.getElementsByClassName('intro');
    for (var i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active_slider');
    }
    for (var i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active_intro');
    }
    slides[slideIndex - 1].classList.add('active_slider');
    dots[slideIndex - 1].classList.add('active_intro');
}
slideShow();
document.getElementById('next').addEventListener('click', function() {
    slideIndex += 1;
    slideShow()
})

document.getElementById('prev').addEventListener('click', function() {
    slideIndex -= 1;
    slideShow()
})




