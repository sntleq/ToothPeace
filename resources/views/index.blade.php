<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover Peace of Mind, One Appointment at a Time.">

    <meta property="og:title" content="ToothPeace">
    <meta property="og:description" content="Discover Peace of Mind, One Appointment at a Time.">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:url" content="https://example.com">

    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <script src="{{ asset('js/jslanding.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>ToothPeace</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo" />
        </div>
    </header>

    <section class="landing_page">
        <h1>
            <span class="blue">TOOTH</span>
            <span class="skyblue">PEACE</span>
        </h1>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
        <div class="buttons">
            <button onclick="location.href='login'">Proceed to Login</button> <br>
            <button onclick="location.href='services'">View Services</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 ToothPeace Dental Clinic</p>
    </footer>
</body>
</html>
