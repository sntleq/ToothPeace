const cancelBtn = document.querySelectorAll(".cancel-btn");
const cancelModal = document.getElementById("cancelModal");
const cancelCancel = document.getElementById("cancelCancel");

if (cancelBtn && cancelModal && cancelCancel) {
    cancelBtn.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            cancelModal.style.display = "flex";
        });
    });

    cancelCancel.addEventListener("click", function () {
        cancelModal.style.display = "none";
    });
}
