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
    <link rel="stylesheet" href="{{ asset('css/patient_profile.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
        <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="{{ route('patient.home') }}"><img src="{{ asset('pics/patient_profile_icon.png') }}" alt="Home">Home</a>
        <a class="active"><img src="{{ asset('pics/patient_icon.png') }}" alt="Profile">Profile</a>
        <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
        <a href="{{ route('patient.waitlist') }}"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Waitlist Entries</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">
    <div class="profile-header">
        <h1 class="section-title">My Profile</h1>
        <button onclick="window.location.href='{{ route('patient.profile.edit') }}'" class="edit-profile-btn">Edit
            Profile
        </button>
    </div>
    <div class="main-container">
        <div class="profile-card">
            <p><strong>Last Name:</strong> <span id="lastName">{{ $patient->last_name ?? 'N/A' }}</span></p>
            <p><strong>First Name:</strong> <span id="firstName">{{ $patient->first_name ?? 'N/A' }}</span></p>
            <p><strong>Date of Birth:</strong> <span id="dob">{{ $patient->dob->format('F d, Y') ?? 'N/A' }}</span></p>
            <p><strong>Email Address:</strong> <span id="email">{{ $patient->email ?? 'N/A' }}</span></p>
        </div>
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

<script src="{{ asset('js/patient_profile.js') }}"></script>
<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>

