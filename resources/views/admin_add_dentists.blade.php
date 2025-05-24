<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Admin Patients</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin_add_dentists.css') }}"/>
</head>
<body>
@if (session('success'))
    <div class="alert-console success">
        {{ session('success') }}
    </div>
@endif
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
    </div>
    <nav>
        <a href="{{ route ('admin.dashboard') }}"><img src="{{ asset('pics/dashboard_icon.png') }}"
                                                                      alt="Dashboard">Dashboard</a>
        <a href="{{ route ('admin.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}"
                                                          alt="Appointments">Appointments</a>
        <a href="{{ route ('admin.waitlist') }}"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
        <a href="{{ route ('admin.patients') }}"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
        <a class="active"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
        <a href="{{ route ('admin.controls') }}"><img src="{{ asset('pics/admincontrols_icon.png') }}"
                                                      alt="Admin Controls">Controls</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">

    <button class="back-button" onclick="window.location.href='{{ route('admin.dentists') }}'">
        <span class="icon">&#8592;</span> Back
    </button>

    <div class="form-container">
        <h2 class="form-title">Add Dentist</h2>
        @if (session()->has('error'))
            <div class="alert-console error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('dentists.store') }}" method="POST" class="dentist-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="first_name" value="{{ old('first_name') }}" />
                    @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="last_name" value="{{ old('last_name') }}" />
                    @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" max="{{ now()->toDateString() }}"/>
                    @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"/>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="password_confirm" value="{{ old('password_confirm') }}" />
                    @error('password_confirm')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">Save</button>
            </div>
        </form>
    </div>
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

<script src="{{ asset('js/admin_add_dentists.js') }}" defer></script>
<script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
</body>
</html>
