<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Admin Dashboard</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin_controls.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
        <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="{{ route ('admin.dashboard') }}"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="{{ route ('admin.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}"
                                                          alt="Appointments">Appointments</a>
        <a href="{{ route ('admin.waitlist') }}"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
        <a href="{{ route ('admin.patients') }}"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
        <a href="{{ route ('admin.dentists') }}"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
        <a class="active"><img src="{{ asset('pics/admincontrols_icon.png') }}" alt="Admin Controls">Controls</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">

    <h1 class="section-title">Admin Controls</h1>

    <div class="controls-wrapper">
        <div class="controls-section">
            @if (session()->has('success'))
                <div class="alert-console success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin-controls.store') }}">
                @csrf
                <div class="control-group">
                    <label for="openingTime">Opening Time:</label>
                    <input
                        type="time"
                        id="openingTime"
                        name="opening_time"
                        value="{{ old('opening_time', $settings['opening_time'] ?? '') }}"
                        required
                    >
                </div>

                <div class="control-group">
                    <label for="closingTime">Closing Time:</label>
                    <input
                        type="time"
                        id="closingTime"
                        name="closing_time"
                        value="{{ old('closing_time', $settings['closing_time'] ?? '') }}"
                        required
                    >
                    @if ($errors->has('closing_time'))
                        <div class="text-danger">{{ $errors->first('closing_time') }}</div>
                    @endif
                </div>

                <div class="button-group">
                    <button type="reset" class="cancel-button">Cancel</button>
                    <button type="submit" class="enter-button">Save</button>
                </div>
            </form>

        </div>

        <div id="logoutModal" class="logout-modal">
            <div class="modal-content">
                <h3>Are you sure you want to log out?</h3>
                <div class="modal-buttons">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" id="confirmLogout" class="confirm-btn">Yes</button>
                    </form>
                    <button id="cancelLogout" class="cancel-btn">No</button>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/admin_controls.js') }}"></script>
        <script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
