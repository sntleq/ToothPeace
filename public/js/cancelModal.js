document.addEventListener("DOMContentLoaded", function () {
    // Select all buttons that start with "cancelBtn"
    const openBtns = document.querySelectorAll(".open-modal");

    openBtns.forEach(button => {
        const id = button.id.replace("cancelBtn", "");
        const modal = document.getElementById("cancelModal" + id);
        // now find the “No” button inside _that_ modal
        const cancelBtn = modal.querySelector(".cancelCancel");

        button.addEventListener("click", function (e) {
            e.preventDefault();
            modal.style.display = "flex";
        });

        cancelBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    });
});
