<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Dentist Dashboard</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dentist_dashboard.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
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
        <a href="{{ route('dentist.schedule') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
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
        <h2 class="section-title">Appointments This Week</h2>
        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                    </thead>
                </table>
                <div class="schedule-wrapper">
                    <div class="schedule-container">

                        <!-- Items -->
                        <a href="#"
                           class="schedule-item col-2 row-2-4">
                            <p class="title">Tooth Extraction</p>
                            <p class="meta">Jayson Gabriel Limosnero<br>9:30AM - 10:30AM</p>
                        </a>

                        <a href="#"
                           class="schedule-item col-1 row-8-10">
                            <p class="title">Data Structures &amp; Algorithms (Lec)</p>
                            <p class="meta">IT203 · 1:00 PM – 2:00 PM</p>
                        </a>

                        <a href="#"
                           class="schedule-item col-2 row-8-11">
                            <p class="title">Readings in Philippine History</p>
                            <p class="meta">IT203 · 1:00 PM – 2:00 PM</p>
                        </a>
                    </div>
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
    <script src="{{ asset('js/dentist_dashboard.js') }}"></script>
</body>
</html>
