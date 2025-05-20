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

    <!-- Pass Laravel route URLs to JS -->
    <script>
        window.resetPasswordRoutes = {
            sendCode: "{{ route('password.email') }}",
            reset: "{{ route('password.update') }}",
            login: "{{ route('login') }}"
        };
    </script>
    
    <!-- External JS file -->
    <script src="{{ asset('js/reset-password.js') }}"></script>
</body>
</html>
