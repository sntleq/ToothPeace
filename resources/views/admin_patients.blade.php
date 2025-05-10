<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Admin Patients</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin_patients.css') }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
      <a href="/admin/Dashboard"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
      <a href="/admin/Appointments"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="/admin/Waitlist"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
      <a href="/admin/Patients"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
      <a href="/admin/Dentists"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
      <a href="/admin/Controls"><img src="{{ asset('pics/admincontrols_icon.png') }}" alt="Admin Controls">Admin Controls</a>
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

    <h1 class="section-title">Patients</h1>

    <div class="search-bar-wrapper">
      <input type="text" placeholder="Search patients..." id="searchInput" class="search-input" />
      <button class="search-btn" id="searchBtn">
        <img src="{{ asset('pics/search_icon.png') }}" alt="Search" />
      </button>
    </div>

    <div id="searchResults" class="search-results hidden"></div>

    <div class="page-wrapper">
      <div class="table-container">
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Patient ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date of Birth</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>P001</td>
                <td>Garcia</td>
                <td>Maria</td>
                <td>Lopez</td>
                <td>mgarcia</td>
                <td>maria.garcia@email.com</td>
                <td>1995-06-20</td>
              </tr>
              <tr>
                <td>P002</td>
                <td>Santos</td>
                <td>Juan</td>
                <td>Reyes</td>
                <td>jsantos</td>
                <td>juan.santos@email.com</td>
                <td>1990-02-14</td>
              </tr>
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

  <script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
