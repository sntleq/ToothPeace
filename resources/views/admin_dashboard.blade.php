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
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
        <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a class="active"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="{{ route ('admin.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}"
                                                          alt="Appointments">Appointments</a>
        <a href="{{ route ('admin.waitlist') }}"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
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

    <div class="datetime-container">
        <div class="date-box" id="dateBox"></div>
        <div class="time-box" id="timeBox"></div>
    </div>

    <div class="appointments-section">
        <h2>Latest Appointments</h2>
        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Appointment Type</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Dentist-in-Charge</th>
                    </tr>
                    </thead>
                    <!--TESTING RANI PARA MAKITA JUD NIMO UNSAY NANWG NIYA TENKS-->
                    <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointmentType->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}</td>
                            <td>{{ $appointment->appointmentType->duration ?? 'N/A' }} mins</td>
                            <td>{{ $appointment->dentist->name ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No active appointments found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    </tbody>
                </table>
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
    <script src="{{ asset('js/admin_dashboard.js') }}"></script>
</body>
</html>
