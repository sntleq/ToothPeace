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
    <link rel="stylesheet" href="{{ asset('css/admin_appointments.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset ('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
    </div>
    <nav>
        <a href="{{ route ('admin.dashboard') }}"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a class="active"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
        <a href="{{ route ('admin.patients') }}"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
        <a href="{{ route ('admin.dentists') }}"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
        <a href="{{ route ('admin.controls') }}"><img src="{{ asset('pics/admincontrols_icon.png') }}"
                                                      alt="Admin Controls">Controls</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">

    <h1 class="section-title">Appointments</h1>

    <div class="search-bar-wrapper">
        <input type="text" placeholder="Search appointments..." id="searchInput" class="search-input"/>
        <button class="search-btn" id="searchBtn">
            <img src="{{ asset('pics/search_icon.png') }}" alt="Search"/>
        </button>
    </div>

    <div id="searchResults" class="search-results hidden">
    </div>

    <div class="page-wrapper">
        <div class="table-container">
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Appointment Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Dentist-in-Charge</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointmentType->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->date->format('Y-m-d') ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $appointment->time)->format('H:i') }}</td>
                            <td>{{ $appointment->dentist->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->is_active ? 'Active' : 'Inactive' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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

<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
<script src="{{ asset('js/admin_appointments.js') }}"></script>
</body>
</html>
