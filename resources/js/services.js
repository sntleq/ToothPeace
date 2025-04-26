function showService(contentId, leftImageSrc) {
    // Hide all service content divs
    const allContent = document.querySelectorAll(".services-type");
    allContent.forEach(section => {
        section.style.display = "none";
    });

    // Show selected content
    const selectedContent = document.getElementById(contentId);
    selectedContent.style.display = "block";

    // Hide service buttons and show the back button
    document.getElementById("serviceButtons").style.display = "none";
    document.getElementById("backToServices").style.display = "block";

    // Fade out the overlay image
    const img = document.getElementById("overlay-left-img");
    img.style.transition = "opacity 0.2s ease-in-out";
    img.style.opacity = 0;

    // Smooth image switch
    setTimeout(() => {
        img.src = leftImageSrc;
        img.onload = () => {
            img.style.opacity = 1;
        };
    }, 200);

    // Slide in the container
    document.getElementById("container").classList.add("right-panel-active");
}

function goBackToServices() {
    const img = document.getElementById("overlay-left-img");
    img.style.transition = "opacity 0.3s ease-in-out";
    img.style.opacity = 0;

    // Remove right-panel-active class to slide back
    document.getElementById("container").classList.remove("right-panel-active");

    setTimeout(() => {
        // Reset overlay image
        img.src = "pics/default_pic.png";
        img.onload = () => {
            img.style.opacity = 1;
        };

        // Hide all service content sections
        const allContent = document.querySelectorAll(".services-type");
        allContent.forEach(section => {
            section.style.display = "none";
        });

        // Show service buttons again
        document.getElementById("serviceButtons").style.display = "block";
        document.getElementById("backToServices").style.display = "none";
    }, 300);
}

window.onload = function () {
    // Hide all service content sections initially
    const allContent = document.querySelectorAll(".services-type");
    allContent.forEach(section => {
        section.style.display = "none";
    });

    // Show service buttons and hide back button
    document.getElementById("serviceButtons").style.display = "block";
    document.getElementById("backToServices").style.display = "none";
};
