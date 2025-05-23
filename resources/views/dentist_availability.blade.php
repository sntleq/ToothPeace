<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Dentist Schedule</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dentist_availability.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
        <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="{{ route('dentist.dashboard') }}"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="{{ route('dentist.schedule') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
        <a class="active"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">
    @if (session('success'))
        <div class="alert-console success" id="alertMessage">
            {{ session('success') }}
        </div>
    @endif

    <div class="availability-header">
        <h1 class="section-title">My Weekly Availability</h1>
        <button onclick="window.location.href='{{ route('dentist.availability.edit') }}'">Set Next Week Availability</button>
    </div>

    <div class="page-wrapper">
        <!-- Current Week Table -->
        <div class="table-container">
            <h1 class="table-header">This Week</h1>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($thisWeek as $entry)
                        <tr>
                            <th>{{ \Carbon\Carbon::parse($entry->date)->format('l') }}</th>
                            <td>{{ \Carbon\Carbon::parse($entry->date)->format('F d, Y') }}</td>
                            <td>{{ $entry->start_time ? \Carbon\Carbon::parse($entry->start_time)->format('h:i A') : 'Not Available' }}</td>
                            <td>{{ $entry->end_time ? \Carbon\Carbon::parse($entry->end_time)->format('h:i A') : 'Not Available' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Next Week Table -->
        <div class="table-container">
            <h1 class="table-header">Next Week</h1>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($nextWeek as $entry)
                        <tr>
                            <th>{{ \Carbon\Carbon::parse($entry->date)->format('l') }}</th>
                            <td>{{ \Carbon\Carbon::parse($entry->date)->format('F d, Y') }}</td>
                            <td>{{ $entry->start_time ? \Carbon\Carbon::parse($entry->start_time)->format('h:i A') : 'Not Available' }}</td>
                            <td>{{ $entry->end_time ? \Carbon\Carbon::parse($entry->end_time)->format('h:i A') : 'Not Available' }}</td>
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
</body>
</html>
