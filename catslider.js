const initCatSlider = () => {
    const imageListCat = document.querySelector(".slider-wrapper-cat .image-list-cat");
    const slideButtonsCat = document.querySelectorAll(".slider-wrapper-cat .slide-button-cat");
    const sliderScrollbarCat = document.querySelector(".laman-container .slider-scrollbar-cat");
    const scrollbarThumbCat = sliderScrollbarCat.querySelector(".scrollbar-thumb-cat");
    const maxScrollLeftCat = imageListCat.scrollWidth - imageListCat.clientWidth;

    // Handle scrollbar thumb drag for cat slider
    scrollbarThumbCat.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumbCat.offsetLeft;

        // Update thumb position on mouse move
        const handleMouseMoveCat = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbarCat.getBoundingClientRect().width - scrollbarThumbCat.offsetWidth;

            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPositionCat = (boundedPosition / maxThumbPosition) * maxScrollLeftCat;

            scrollbarThumbCat.style.left = `${boundedPosition}px`;
            imageListCat.scrollLeft = scrollPositionCat;
        }

        // Remove event listeners on mouse up
        const handleMouseUpCat = () => {
            document.removeEventListener("mousemove", handleMouseMoveCat);
            document.removeEventListener("mouseup", handleMouseUpCat);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMoveCat);
        document.addEventListener("mouseup", handleMouseUpCat);
    });

    // Slide images according to the slide button clicks for cat slider
    slideButtonsCat.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide-cat" ? -1 : 1;
            const scrollAmountCat = imageListCat.clientWidth * direction;
            imageListCat.scrollBy({ left: scrollAmountCat, behavior: "smooth" });
        });
    });

    const handleSlideButtonsCat = () => {
        slideButtonsCat[0].style.display = imageListCat.scrollLeft <= 0 ? "none" : "block";
        slideButtonsCat[1].style.display = imageListCat.scrollLeft >= maxScrollLeftCat ? "none" : "block";
    };

    const updateScrollThumbPositionCat = () => {
        const scrollPositionCat = imageListCat.scrollLeft;
        const maxScrollLeftCat = imageListCat.scrollWidth - imageListCat.clientWidth;
        const thumbPositionCat = (scrollPositionCat / maxScrollLeftCat) * (sliderScrollbarCat.clientWidth - scrollbarThumbCat.offsetWidth);
        scrollbarThumbCat.style.left = `${thumbPositionCat}px`;
    };

    imageListCat.addEventListener("scroll", () => {
        handleSlideButtonsCat();
        updateScrollThumbPositionCat();
    });
};

window.addEventListener("load", initCatSlider);