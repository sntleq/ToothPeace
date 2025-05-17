<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    @if (session('success'))
        <div class="alert-console success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert-console error">{{ session('error') }}</div>
    @endif

    <div class="container {{ session('isSignUp') ? 'right-panel-active' : '' }}" id="container">
        <!-- Sign Up Form -->
        <div class="form-container sign-up-container">
            <form action="{{ route('auth.signup') }}" method="POST">
                @csrf
                <h1>Create Account</h1>

                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required />
                @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required />
                @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="email" name="signup_email" value="{{ old('signup_email') }}" placeholder="Email" required />
                @error('signup_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="date" name="dob" value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" required />
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password" placeholder="Password" required />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn-signup">Sign Up</button>
                <div class="switch">
                    <h6>Already have an account?</h6>
                    <a href="{{ route('login') }}" class="ghost" id="backToLogin">Login</a>
                </div>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-container sign-in-container">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <a href="{{ route('home') }}" class="loginback">Back</a>
                <h1>Sign In</h1>
                <p>Enter your details below.</p>

                <input type="email" name="login_email" placeholder="Email" value="{{ old('login_email') }}" required />
                @error('login_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password" placeholder="Password" required />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <a href="{{ route('password.reset') }}" class="forget_pass">Forgot Password?</a>
                <button class="btn-login" type="submit">Login</button>

                <div class="switch">
                    <h6>Don't have an account?</h6>
                    <a href="{{ route('signup') }}" class="ghost" id="signUp">Sign Up</a>
                </div>
            </form>
        </div>

        <!-- Overlay -->
        <div class="overlay-container">
            @if ($errors->has('login'))
                <div class="alert-console error">{{ $errors->first('login') }}</div>
            @endif
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="{{ asset('pics/signup_pic.png') }}" alt="Dental" />
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="{{ asset('pics/login_pic.png') }}" alt="Dental" />
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 ToothPeace Dental Clinic</p>
    </footer>

    <script>
        // Simple script to handle panel transitions
        document.addEventListener('DOMContentLoaded', function() {
            const signUpLink = document.getElementById('signUp');
            const backToLoginLink = document.getElementById('backToLogin');
            const container = document.getElementById('container');

            if (signUpLink) {
                signUpLink.addEventListener('click', function(e) {
                    container.classList.add('right-panel-active');
                });
            }

            if (backToLoginLink) {
                backToLoginLink.addEventListener('click', function(e) {
                    container.classList.remove('right-panel-active');
                });
            }
        });
    </script>
</body>
</html>
