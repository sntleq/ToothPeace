<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Dentist Dashboard</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dentist_dashboard.css') }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="{{ route('dentist.dashboard') }}" class="active"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="{{ route('dentist.schedule') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Schedule">Schedule</a>
        <a href="{{ route('dentist.availability') }}"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
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

    <h1>Dashboard Overview</h1>

    <div class="overview-cards">
        <div class="card">
          <div class="icon-container">
            <img src="{{ asset('pics/ptoday_icon.png') }}" alt="Patients Today" />
          </div>
          <p>Total Upcoming Appointments</p>
        </div>

        <div class="card">
          <div class="icon-container">
            <img src="{{ asset('pics/tpatients_icon.png') }}" alt="Total Patients" />
          </div>
          <p>Total Completed Appointments</p>
        </div>
      </div>

    <div class="appointments-section">
    <h2>Weekly Upcoming Appointments</h2>
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
              <th>Sunday</th>
            </tr>
          </thead>
          <!--TESTING RANI PARA MAKITA JUD NIMO UNSAY NANWG NIYA TENKS-->
          <tbody>
            <tr><td>Tooth Extraction <br> Gaile Casio <br> @ 1pm - 2pm </td>
                <td>Dental Cleaning <br> Shene Booc <br> @ 1pm - 2pm </td>
                <td>Dental Checkup <br> Jodeci Pacibe <br> @ 1pm - 2pm </td>
                <td>Tooth Filling <br> Emmanuel Inot <br> @ 1pm - 2pm </td>
                <td>Dental Implants <br> Roberto Vender <br> @ 1pm - 2pm </td>
                <td>Wisdom Tooth Extraction <br> John Paul Noquiana <br> @ 1pm - 2pm </td>
                <td>Dental Crown <br> Gaile Casio <br> @ 1pm - 2pm </td>
            </tr>
            <tr><td>Tooth Extraction <br> Gaile Casio <br> @ 1pm - 2pm </td>
                <td>Dental Cleaning <br> Shene Booc <br> @ 1pm - 2pm </td>
                <td>Dental Checkup <br> Jodeci Pacibe <br> @ 1pm - 2pm </td>
                <td>Tooth Filling <br> Emmanuel Inot <br> @ 1pm - 2pm </td>
                <td>Dental Implants <br> Roberto Vender <br> @ 1pm - 2pm </td>
                <td>Wisdom Tooth Extraction <br> John Paul Noquiana <br> @ 1pm - 2pm </td>
                <td>Dental Crown <br> Gaile Casio <br> @ 1pm - 2pm </td>
            </tr>
            <tr><td>Tooth Extraction <br> Gaile Casio <br> @ 1pm - 2pm </td>
                <td>Dental Cleaning <br> Shene Booc <br> @ 1pm - 2pm </td>
                <td>Dental Checkup <br> Jodeci Pacibe <br> @ 1pm - 2pm </td>
                <td>Tooth Filling <br> Emmanuel Inot <br> @ 1pm - 2pm </td>
                <td>Dental Implants <br> Roberto Vender <br> @ 1pm - 2pm </td>
                <td>Wisdom Tooth Extraction <br> John Paul Noquiana <br> @ 1pm - 2pm </td>
                <td>Dental Crown <br> Gaile Casio <br> @ 1pm - 2pm </td>
            </tr>
            <tr><td>Tooth Extraction <br> Gaile Casio <br> @ 1pm - 2pm </td>
                <td>Dental Cleaning <br> Shene Booc <br> @ 1pm - 2pm </td>
                <td>Dental Checkup <br> Jodeci Pacibe <br> @ 1pm - 2pm </td>
                <td>Tooth Filling <br> Emmanuel Inot <br> @ 1pm - 2pm </td>
                <td>Dental Implants <br> Roberto Vender <br> @ 1pm - 2pm </td>
                <td>Wisdom Tooth Extraction <br> John Paul Noquiana <br> @ 1pm - 2pm </td>
                <td>Dental Crown <br> Gaile Casio <br> @ 1pm - 2pm </td>
            </tr>
            <tr><td>Tooth Extraction <br> Gaile Casio <br> @ 1pm - 2pm </td>
                <td>Dental Cleaning <br> Shene Booc <br> @ 1pm - 2pm </td>
                <td>Dental Checkup <br> Jodeci Pacibe <br> @ 1pm - 2pm </td>
                <td>Tooth Filling <br> Emmanuel Inot <br> @ 1pm - 2pm </td>
                <td>Dental Implants <br> Roberto Vender <br> @ 1pm - 2pm </td>
                <td>Wisdom Tooth Extraction <br> John Paul Noquiana <br> @ 1pm - 2pm </td>
                <td>Dental Crown <br> Gaile Casio <br> @ 1pm - 2pm </td>
            </tr>
          </tbody>
        </table>
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

  <script src="{{ asset('js/dateLinksLogout.js') }}"></script>
  <script src="{{ asset('js/dentist_dashboard.js') }}"></script>
</body>
</html>
