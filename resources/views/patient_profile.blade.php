<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Admin Dashboard</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/patient_profile.css') }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
      <a class="active"><img src="{{ asset('pics/patient_profile_icon.png') }}" alt="Home">Home</a>
      <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="{{ route('patient.waitlist') }}"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Waitlist Entry</a>
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

    <div class="main-container">
        <h1>Welcome, User!</h1>
        <p>Book your smile appointment today</p>

        <div class="container">
            <div class="table-container">
                <h2 class="table-title">Upcoming Appointments</h2>
                <div class="table-wrapper">
                    <table class="appointment-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Dentist</th>
                                <th>Appointment Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>08/24/2025</td>
                                <td>01:30 PM</td>
                                <td>Jhane Gabiana</td>
                                <td><span class="appt-type">Brace Consultation</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-badge">My Profile</div>
                    <a href="{{ route('patient.profile.edit') }}">Edit Profile</a>
                    </div>
                    <p><strong>Last Name:</strong> <span id="lastName"></span></p>
                    <p><strong>First Name:</strong> <span id="firstName"></span></p>
                    <p><strong>Middle Name:</strong> <span id="middleName"></span></p>
                    <p><strong>Suffix:</strong> <span id="suffix"></span></p>
                    <p><strong>Date of Birth:</strong> <span id="dob"></span></p>
                    <p><strong>Email Address:</strong> <span id="email"></span></p>
                </div>
            </div>
    </div>
  </div>
  <div id="logoutModal" class="logout-modal">
    <div class="modal-content">
      <h3>Are you sure you want to log out?</h3>
      <div class="modal-buttons">
        <button id="confirmLogout" data-url="{{ route('auth.logout') }}" class="confirm-btn">Yes</button>
        <button id="cancelLogout" class="cancel-btn">No</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/patient_profile.js') }}"></script>
  <script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>

