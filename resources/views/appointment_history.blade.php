<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Appointment History</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/appointment_history.css' ) }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
      <a href="patient/Profile"><img src="{{ asset('pics/patient_profile_icon.png') }}" alt="Home">Home</a>
      <a href="patient/Appointments" class="active"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="patient/Waitlist"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Entry</a>
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
      <button onclick="window.location.href='{{ route('patient.appointments') }}'" class="back-button">&larr; Back</button>

      <div class="table-container">
        <h1 class="table-title">Appointment History</h1>
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
              <tr>
                <td>March 10, 2025</td>
                <td>1:00 PM</td>
                <td>Extraction</td>
                <td>Dr. Reyes</td>
                <td class="status-completed">Completed</td>
              </tr>
              <tr>
                <td>February 15, 2025</td>
                <td>9:00 AM</td>
                <td>Cleaning</td>
                <td>Dr. Santos</td>
                <td class="status-completed">Completed</td>
              </tr>
              <!-- Add lag dummy rows if needed -->
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
        <button id="confirmLogout" class="confirm-btn">Yes</button>
        <button id="cancelLogout" class="cancel-btn">No</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
</body>
</html>
