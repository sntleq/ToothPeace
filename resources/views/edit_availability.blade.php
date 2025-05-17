<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Dentist Schedule</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
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
        <a href="{{ route('dentist.schedule') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Schedule">Schedule</a>
        <a class="active"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">
    <a href="{{ route('patient.home') }}" class="back-button">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    <div class="form-container">
        <h2 class="form-title">Edit Availability</h2>

        <form class="patient-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="availability-mode">Setting Mode</label>
                    <select id="availability-mode" name="availability_mode">
                        <option value="available">Recurring (For every week since next week)</option>
                        <option value="not-available">Override (For next week only)</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Monday: Time In</label>
                    <input type="text" id="firstName" name="firstName"/>
                </div>
                <div class="form-group">
                    <label for="middleName">Monday: Time Out</label>
                    <input type="text" id="middleName" name="middleName"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Tuesday: Time In</label>
                    <input type="text" id="firstName" name="firstName"/>
                </div>
                <div class="form-group">
                    <label for="middleName">Tuesday: Time Out</label>
                    <input type="text" id="middleName" name="middleName"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Wednesday: Time In</label>
                    <input type="text" id="firstName" name="firstName"/>
                </div>
                <div class="form-group">
                    <label for="middleName">Wednesday: Time Out</label>
                    <input type="text" id="middleName" name="middleName"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Thursday: Time In</label>
                    <input type="text" id="firstName" name="firstName"/>
                </div>
                <div class="form-group">
                    <label for="middleName">Thursday: Time Out</label>
                    <input type="text" id="middleName" name="middleName"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Friday: Time In</label>
                    <input type="text" id="firstName" name="firstName"/>
                </div>
                <div class="form-group">
                    <label for="middleName">Friday: Time Out</label>
                    <input type="text" id="middleName" name="middleName"/>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">Save</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='/patient/Profile'">Cancel
                </button>
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

<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
