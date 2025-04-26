function sendVerificationCode() {
    const email = document.getElementById('email').value;
    if (email) {
        alert(`Verification code sent to ${email}`);
    } else {
        alert('Please enter your email first.');
    }
}