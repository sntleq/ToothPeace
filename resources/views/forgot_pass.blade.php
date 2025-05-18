<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ToothPeace</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/forgotpass.css') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container pass-container">
            <form action="{{ route('password.update') }}" method="POST" id="resetPasswordForm">
                @csrf
                <div id="alert-message" class="alert-message"></div>
                
                <div class="back-button-wrapper">
                    <a href="{{ route('login') }}" class="loginback">Back</a>
                </div>
                
                <h1>Forgot Password</h1>
                <p>Enter your email below to reset your password.</p>
                
                <input type="email" placeholder="Email" id="email" name="email" required/>
                <button type="button" class="btn-send-code" id="sendCode">Send Code</button>
                
                <div id="resetFields" style="display: none;">
                    <input type="text" placeholder="Enter Code" id="code" name="code" required />
                    <input type="password" placeholder="New Password" id="password" name="password" required />
                    <input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required />
                    <button class="btn-login" type="submit" id="resetBtn">Reset Password</button>
                </div>
                
                <div class="row-link">
                    <h6>Remember your password?</h6>
                    <a href="{{ route('login') }}" class="ghost" id="backToLogin">Login</a>
                </div>
                <div class="row-link">
                    <h6>Don't have an account?</h6>
                    <a href="{{ route('signup') }}" class="ghost" id="signUp">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 ToothPeace Dental Clinic</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendCodeBtn = document.getElementById('sendCode');
            const resetForm = document.getElementById('resetPasswordForm');
            const resetFields = document.getElementById('resetFields');
            const alertMessage = document.getElementById('alert-message');
            
            // Setup CSRF token for all AJAX requests
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            function showAlert(message, type) {
                alertMessage.textContent = message;
                alertMessage.className = 'alert-message ' + type;
                alertMessage.style.display = 'block';
                
                // Hide after 5 seconds
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
                
                // Disable button and show loading state
                sendCodeBtn.disabled = true;
                sendCodeBtn.textContent = 'Sending...';
                
                fetch('{{ route("password.email") }}', {
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
                        resetFields.style.display = 'block'; //Show fields only if success = true

                        // Optional: disable resend for countdown
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
                        resetFields.style.display = 'none'; //Hide fields if not found
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
            
            // Reset password form submission
            resetForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = {
                    email: document.getElementById('email').value,
                    code: document.getElementById('code').value,
                    password: document.getElementById('password').value,
                    password_confirmation: document.getElementById('password_confirmation').value
                };
                
                // Basic validation
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
                
                // Disable reset button and show loading
                const resetBtn = document.getElementById('resetBtn');
                resetBtn.disabled = true;
                resetBtn.textContent = 'Processing...';
                
                fetch('{{ route("password.update") }}', { // Use "password.update" instead of "password.reset"
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
                        // Redirect to login page after successful reset
                        setTimeout(() => {
                            window.location.href = '{{ route("login") }}';
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
    </script>
</body>
</html>