document.addEventListener('DOMContentLoaded', function() {
    const sendCodeBtn = document.getElementById('sendCode');
    const resetForm = document.getElementById('resetPasswordForm');
    const resetFields = document.getElementById('resetFields');
    const alertMessage = document.getElementById('alert-message');

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Helper to show alert
    function showAlert(message, type) {
        alertMessage.textContent = message;
        alertMessage.className = 'alert-message ' + type;
        alertMessage.style.display = 'block';

        setTimeout(() => {
            alertMessage.style.display = 'none';
        }, 5000);
    }

    // Send verification code
    sendCodeBtn.addEventListener('click', function() {
        const email = document.getElementById('email').value;

        if (!email) {
            showAlert('Please enter your email address', 'error');
            return;
        }

        sendCodeBtn.disabled = true;
        sendCodeBtn.textContent = 'Sending...';

        fetch(window.resetPasswordRoutes.sendCode, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email: email })
        })
        .then(async response => {
            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new Error(errorData.message || `Server error (${response.status}). Please try again later.`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                resetFields.style.display = 'block';

                let countdown = 60;
                sendCodeBtn.textContent = `Resend in ${countdown}s`;

                const timer = setInterval(() => {
                    countdown--;
                    if (countdown <= 0) {
                        clearInterval(timer);
                        sendCodeBtn.disabled = false;
                        sendCodeBtn.textContent = 'Resend Code';
                    } else {
                        sendCodeBtn.textContent = `Resend in ${countdown}s`;
                    }
                }, 1000);
            } else {
                resetFields.style.display = 'none';
                showAlert(data.message || 'Failed to send reset code', 'error');
                sendCodeBtn.disabled = false;
                sendCodeBtn.textContent = 'Send Code';
            }
        })
        .catch(error => {
            console.error('Reset code error:', error);
            const errorMessage = error.message.includes('Server error') 
                ? error.message 
                : 'An error occurred while sending the reset code. Please try again later.';
            showAlert(errorMessage, 'error');
            sendCodeBtn.disabled = false;
            sendCodeBtn.textContent = 'Send Code';
        });
    });

    // Reset password submission
    resetForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = {
            email: document.getElementById('email').value,
            code: document.getElementById('code').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value
        };

        if (!formData.code) {
            showAlert('Please enter the verification code', 'error');
            return;
        }

        if (!formData.password) {
            showAlert('Please enter your new password', 'error');
            return;
        }

        if (formData.password.length < 8) {
            showAlert('Password must be at least 8 characters long', 'error');
            return;
        }

        if (formData.password !== formData.password_confirmation) {
            showAlert('Passwords do not match', 'error');
            return;
        }

        const resetBtn = document.getElementById('resetBtn');
        resetBtn.disabled = true;
        resetBtn.textContent = 'Processing...';

        fetch(window.resetPasswordRoutes.reset, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => {
                    window.location.href = window.resetPasswordRoutes.login;
                }, 3000);
            } else {
                showAlert(data.message, 'error');
                resetBtn.disabled = false;
                resetBtn.textContent = 'Reset Password';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred. Please try again.', 'error');
            resetBtn.disabled = false;
            resetBtn.textContent = 'Reset Password';
        });
    });
});
