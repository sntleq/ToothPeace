<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Admin Waitlist</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/sharedLayout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin_waitlist.css') }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
      <a href="Dashboard" class="active"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
      <a href="Appointments"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="Waitlist"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
      <a href="Patients"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
      <a href="Dentists"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
      <a href="Controls"><img src="{{ asset('pics/admincontrols_icon.png') }}" alt="Admin Controls">Admin Controls</a>
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

        <h1 class="section-title">Waitlist</h1>

        <div class="search-bar-wrapper">
            <input type="text" placeholder="Search waitlist..." id="searchInput" class="search-input" />
            <button class="search-btn" id="searchBtn">
              <img src="{{ asset('pics/search_icon.png') }}" alt="Search" />
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
                      <th>Waitlist ID</th>
                      <th>Patient</th>
                      <th>Dentist</th>
                      <th>Appointment Type</th>
                      <th>Date</th>
                      <th>Time Start</th>
                      <th>Time End</th>
                    </tr>
                  </thead>
              <tbody>
                <tr>
                    <td>W001</td>
                    <td>Jane Smith</td>
                    <td>Dr. Cruz</td>
                    <td>Check-up</td>
                    <td>2025-04-18</td>
                    <td>09:00 AM</td>
                    <td>09:30 AM</td>
                  </tr>
                  <tr>
                    <td>W002</td>
                    <td>Mark Reyes</td>
                    <td>Dr. Lopez</td>
                    <td>Cleaning</td>
                    <td>2025-04-18</td>
                    <td>10:00 AM</td>
                    <td>10:45 AM</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
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
  
    <script src="{{ asset('js/dateLinksLogout.js') }}"></script>
  </body>
  </html>