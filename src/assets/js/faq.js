document.addEventListener("DOMContentLoaded", function() {
    const detailsElements = document.querySelectorAll("#faq details");

    detailsElements.forEach((details) => {
        details.addEventListener("toggle", () => {
            if (details.open) {
                detailsElements.forEach((el) => {
                    if (el !== details && el.open) {
                        el.removeAttribute("open");
                    }
                });
            }
        });
    });
});