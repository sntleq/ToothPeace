<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/forgotpass.css') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<div class="container" id="container">
    <div class="form-container pass-container">
        <form action="#">
            <div class="back-button-wrapper">
                <button class="loginback" onclick="location.href='login'" type="button">Back</button>
            </div>
            <h1>Forgot Password</h1>
            <p>Enter your details below to reset your password.</p>
            <input type="email" placeholder="Email" id="email" required/>
            <button type="button" class="btn-send-code" id="sendCode" onclick="sendVerificationCode()">Send Code
            </button>
            <input type="text" placeholder="Enter Code" id="code" required/>
            <input type="password" placeholder="New Password" id="new-password" required/>
            <input type="password" placeholder="Confirm Password" id="confirm-password" required/>
            <button class="btn-login" type="submit">Reset Password</button>
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

<script src="{{ asset('js/forgotpass.js') }}"></script>
</body>
</html>
