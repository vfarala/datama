const initBirdSlider = () => {
    const imageListBird = document.querySelector(".slider-wrapper-bird .image-list-bird");
    const slideButtonsBird = document.querySelectorAll(".slider-wrapper-bird .slide-button-bird");
    const sliderScrollbarBird = document.querySelector(".laman-container .slider-scrollbar-bird");
    const scrollbarThumbBird = sliderScrollbarBird.querySelector(".scrollbar-thumb-bird");
    const maxScrollLeftBird = imageListBird.scrollWidth - imageListBird.clientWidth;

    // Handle scrollbar thumb drag for bird slider
    scrollbarThumbBird.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumbBird.offsetLeft;

        // Update thumb position on mouse move
        const handleMouseMoveBird = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbarBird.getBoundingClientRect().width - scrollbarThumbBird.offsetWidth;

            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPositionBird = (boundedPosition / maxThumbPosition) * maxScrollLeftBird;

            scrollbarThumbBird.style.left = `${boundedPosition}px`;
            imageListBird.scrollLeft = scrollPositionBird;
        }

        // Remove event listeners on mouse up
        const handleMouseUpBird = () => {
            document.removeEventListener("mousemove", handleMouseMoveBird);
            document.removeEventListener("mouseup", handleMouseUpBird);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMoveBird);
        document.addEventListener("mouseup", handleMouseUpBird);
    });

    // Slide images according to the slide button clicks for bird slider
    slideButtonsBird.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide-bird" ? -1 : 1;
            const scrollAmountBird = imageListBird.clientWidth * direction;
            imageListBird.scrollBy({ left: scrollAmountBird, behavior: "smooth" });
        });
    });

    const handleSlideButtonsBird = () => {
        slideButtonsBird[0].style.display = imageListBird.scrollLeft <= 0 ? "none" : "block";
        slideButtonsBird[1].style.display = imageListBird.scrollLeft >= maxScrollLeftBird ? "none" : "block";
    };

    const updateScrollThumbPositionBird = () => {
        const scrollPositionBird = imageListBird.scrollLeft;
        const maxScrollLeftBird = imageListBird.scrollWidth - imageListBird.clientWidth;
        const thumbPositionBird = (scrollPositionBird / maxScrollLeftBird) * (sliderScrollbarBird.clientWidth - scrollbarThumbBird.offsetWidth);
        scrollbarThumbBird.style.left = `${thumbPositionBird}px`;
    };

    imageListBird.addEventListener("scroll", () => {
        handleSlideButtonsBird();
        updateScrollThumbPositionBird();
    });
};

window.addEventListener("load", initBirdSlider);