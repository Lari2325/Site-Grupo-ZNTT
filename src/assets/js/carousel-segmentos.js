document.querySelectorAll('input[name="carousel-segmento"]').forEach((input) => {
    input.addEventListener('change', function() {
        const value = this.value;
        let translateX;
        if (window.innerWidth <= 768) {
            translateX = value * -95;
        } else {
            translateX = value * -25;
        }
        document.getElementById('carousel-segmentos').style.transform = `translateX(${translateX}vw)`;
    });
});

window.addEventListener('resize', () => {
    const selectedInput = document.querySelector('input[name="carousel-segmento"]:checked');
    if (selectedInput) {
        const value = selectedInput.value;
        let translateX;
        if (window.innerWidth <= 768) {
            translateX = value * -95;
        } else {
            translateX = value * -25;
        }
        document.getElementById('carousel-segmentos').style.transform = `translateX(${translateX}vw)`;
    }
});