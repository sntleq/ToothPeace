<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Dentist Appointment History</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dentist_schedule_history.css') }}" />
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
        <a class="active"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Schedule">Schedule</a>
        <a href="{{ route('dentist.availability') }}"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
  </div>

  <div class="main-content">

    <h1><span class="page-title">Appointment History</span></h1>

    <button class="back-button" onclick="window.location.href='/dentist/Schedule'">
      <span class="icon">&#8592;</span> Back
    </button>

    <div class="search-bar-wrapper">
        <div class="search-group">
          <input type="text" placeholder="Search Patient/Appointment Type" id="searchInput" class="search-input" />
          <button class="search-btn" id="searchBtn">
            <img src="{{ asset('pics/search_icon.png') }}" alt="Search" />
          </button>
        </div>
     </div>

    <div id="searchResults" class="search-results hidden"></div>

    <div class="page-wrapper">
    <h1 class="section-title"></h1>
      <div class="table-container">
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Appointment Type</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>05-10-2025</td>
                <td>01:00 AM</td>
                <td>02:00 AM</td>
                <td>Casio</td>
                <td>Gaile</td>
                <td>Tooth Extraction</td>
              </tr>
              <tr>
                <td>05-10-2025</td>
                <td>01:00 AM</td>
                <td>02:00 AM</td>
                <td>Casio</td>
                <td>Gaile</td>
                <td>Tooth Extraction</td>
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
          <form action="{{ route('auth.logout') }}" method="POST">
          @csrf
              <button type="submit" id="confirmLogout" class="confirm-btn">Yes</button>
          </form>
          <button id="cancelLogout" class="cancel-btn">No</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
</body>
</html>
