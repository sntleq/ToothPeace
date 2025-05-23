const cancelBtn = document.getElementById("cancellingButton");
const cancelModal = document.getElementById("cancelModal");
const cancelCancel = document.getElementById("cancelCancel");

if (cancelBtn && cancelModal && cancelCancel) {
    cancelBtn.addEventListener("click", function (e) {
        e.preventDefault();
        cancelModal.style.display = "flex";
    });

    cancelCancel.addEventListener("click", function () {
        cancelModal.style.display = "none";
    });
}
