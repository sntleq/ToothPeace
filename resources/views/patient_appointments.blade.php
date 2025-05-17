<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Appointments</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/patient_appointments.css') }}" />
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
      <a href="{{ route('patient.profile') }}"><img src="{{ asset('pics/patient_icon.png') }}" alt="Profile">Profile</a>
      <a class="active"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="{{ route('patient.waitlist') }}"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Waitlist Entry</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
      <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
  </div>

  <div class="main-content">

    <div class="main-container">
      <h1>Welcome, User!</h1>
      <p>Book your smile appointment today</p>

      <div class="table-container">
        <h1 class="table-header">My Appointments</h1>
        <div class="table-wrapper">
          <table class="appointments-table">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment Type</th>
                <th>Dentist</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample Scrollable Data -->
              <tr><td>April 20, 2025</td><td>10:30 AM</td><td>Cleaning</td><td>Dr. Santos</td><td class="status-confirmed">Confirmed</td></tr>
              <tr><td>April 21, 2025</td><td>11:00 AM</td><td>Filling</td><td>Dr. Cruz</td><td class="status-pending">Pending</td></tr>
              <tr><td>April 22, 2025</td><td>9:00 AM</td><td>Consultation</td><td>Dr. Reyes</td><td class="status-waiting">Waiting</td></tr>
              <tr><td>April 23, 2025</td><td>1:30 PM</td><td>Cleaning</td><td>Dr. Santos</td><td class="status-confirmed">Confirmed</td></tr>
              <tr><td>April 24, 2025</td><td>3:00 PM</td><td>Check-up</td><td>Dr. Reyes</td><td class="status-confirmed">Confirmed</td></tr>
              <tr><td>April 25, 2025</td><td>10:00 AM</td><td>Extraction</td><td>Dr. Cruz</td><td class="status-pending">Pending</td></tr>
              <tr><td>April 26, 2025</td><td>2:00 PM</td><td>Filling</td><td>Dr. Santos</td><td class="status-waiting">Waiting</td></tr>
              <tr><td>April 27, 2025</td><td>2:00 PM</td><td>Root Canal</td><td>Dr. Santos</td><td class="status-confirmed">Confirmed</td></tr>
              <tr><td>April 28, 2025</td><td>2:00 PM</td><td>Implant</td><td>Dr. Reyes</td><td class="status-confirmed">Confirmed</td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="appointment-history-btn-wrapper">
        <button class="appointment-history-btn" onclick="window.location.href='{{ route('patient.appointments.history') }}'">
          View Appointment History
        </button>
      </div>
    </div>
  </div>

  <div id="logoutModal" class="logout-modal">
    <div class="modal-content">
      <h3>Are you sure you want to log out?</h3>
      <div class="modal-buttons">
        <button id="confirmLogout" class="confirm-btn">Yes</button>
        <button id="cancelLogout" class="cancel-btn">No</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/patient_appointments.js') }}" defer></script>
  <script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
</body>
</html>
