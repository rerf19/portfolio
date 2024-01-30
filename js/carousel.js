document.addEventListener('DOMContentLoaded', function () {
    const radioInputs = document.querySelectorAll('.radioB input');
    const carousel = document.getElementById('carousel');

    radioInputs.forEach((input, index) => {
        input.addEventListener('change', function () {
            carousel.style.setProperty('--position', index + 1);
        });
    });
});