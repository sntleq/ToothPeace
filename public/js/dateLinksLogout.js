// — Live Date / Day / Time —
function updateDateTime() {
    const now = new Date();
    const dateBox = document.getElementById('dateBox');
    const timeBox = document.getElementById('timeBox');

    if (dateBox) {
        const formattedDate = now.toLocaleDateString(undefined, {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        dateBox.textContent = formattedDate;
    }

    if (timeBox) {
        let h = now.getHours(), m = now.getMinutes(), s = now.getSeconds(), ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12 || 12;
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        timeBox.textContent = `${h}:${m}:${s} ${ampm}`;
    }
}

setInterval(updateDateTime, 1000);
updateDateTime();

// — Logout Modal —
const logoutBtn = document.getElementById("logoutButton");
const logoutModal = document.getElementById("logoutModal");
const cancelLogout = document.getElementById("cancelLogout");

if (logoutBtn && logoutModal && cancelLogout) {
    logoutBtn.addEventListener("click", function (e) {
        e.preventDefault();
        logoutModal.style.display = "flex";
    });

    cancelLogout.addEventListener("click", function () {
        logoutModal.style.display = "none";
    });
}
