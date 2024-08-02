
document.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImg");
    const images = document.getElementsByClassName("carousel-img");
    const closeButton = document.querySelector(".close");
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");

    let currentIndex = 0;

    function openModal(index) {
        modal.style.display = "flex";
        modalImg.src = images[index].src;
        currentIndex = index;
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function showPrev() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
        modalImg.src = images[currentIndex].src;
    }

    function showNext() {
        currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
        modalImg.src = images[currentIndex].src;
    }

    Array.from(images).forEach((image, index) => {
        image.addEventListener('click', () => {
            openModal(index);
        });
    });

    closeButton.addEventListener('click', closeModal);
    prevButton.addEventListener('click', showPrev);
    nextButton.addEventListener('click', showNext);

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});