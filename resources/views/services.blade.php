<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace Login</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<div class="container" id="container">
    <div class="form-container services-type-container">
        <form action="#">
            <button type="button" class="ghost" id="backToServices" style="display:none;" onclick="goBackToServices()">
                Back to Services
            </button>
            @foreach($categories as $category)
                <div class="services-type" id="content{{ $category->id }}">
                    <h1>{{ $category->name }}</h1>
                    @foreach($types->where('appointment_category_id', $category->id) as $type)
                        <button type="button" class="ghost">
                            {{ $type->name }}
                        </button>
                    @endforeach
                </div>
            @endforeach

        </form>
    </div>

    <div class="form-container services-container">
        <form action="#">
            <a href="{{ route('home') }}" class="loginback">Back</a>
            <h1>Dental Services</h1>
            <div class="buttons" id="serviceButtons">
                @foreach($categories as $category)
                    <button type="button" class="ghost" id="service{{ $category->id }}"
                            onclick="showService('content{{ $category->id }}', 'pics/dental_appointments.png')">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </form>
    </div>


    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <img id="overlay-left-img" src="{{ asset('pics/default_pic.png') }}" alt="Dental"/>
            </div>
            <div class="overlay-panel overlay-right">
                <img src="{{ asset('pics/dental_services.png') }}" alt="Dental"/>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2025 ToothPeace Dental Clinic</p>
</footer>

<script src="{{ asset('js/services.js') }}"></script>
</body>
</html>
