<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace</title>
    <link rel="icon" href="../pics/toothpeace_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <input type="text" placeholder="First Name" />
                <input type="text" placeholder="Last Name" />
                <input type="email" placeholder="Email" />
                <input type="email" placeholder="Username" />
                <input type="password" placeholder="Password" />
                <button class="btn-signup">Sign Up</button>
                <div class="switch">
                    <h6>Already have an account?</h6>
                    <button type="button" class="ghost" id="backToLogin">Login</button>
                </div>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="#">
                <button class="loginback" onclick="location.href='index.html'" type="button">Back</button>
                <h1>Sign in</h1>
                <p>Enter your details below.</p>
                <input type="email" placeholder="Username" />
                <input type="password" placeholder="Password" />
                <a href="index.blade.php" class="forget_pass">Forgot Password?</a>
                <button class="btn-login">Login</button>
                <h6>Don't have an account?</h6>
                <button type="button" class="ghost" id="signUp">Sign Up</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                <img src="../pics/signup_pic.png" alt="Dental" />
                </div>
                <div class="overlay-panel overlay-right">
                <img src="../pics/login_pic.png" alt="Dental" />
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 ToothPeace Dental Clinic</p>
    </footer>

    <script src="../js/login.js"></script>
</body>
</html>
