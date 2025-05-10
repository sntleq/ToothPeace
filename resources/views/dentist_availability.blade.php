<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Dentist Schedule</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/dentist_availability.css') }}" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="/dentist/Dashboard" class="active"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="/dentist/Schedule"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Schedule">Schedule</a>
        <a href="/dentist/Availability"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
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

    <h1 class="section-title">Weekly Schedule Availability</h1>

    <div class="page-wrapper">
    <h1 class="section-title"></h1>
      <div class="table-container">
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Day</th>
                <th>08:00 AM</th>
                <th>09:00 AM</th>
                <th>10:00 AM</th>
                <th>11:00 AM</th>
                <th>12:00 PM</th>
                <th>01:00 PM</th>
                <th>02:00 PM</th>
                <th>03:00 PM</th>
                <th>04:00 PM</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Monday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Tuesday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Wednesday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Thursday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Friday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Saturday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
              <tr>
                <th>Sunday</th>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
                <td>Not Available</td>
                <td>Available</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><br>
    <h1 class="section-title">Set Schedule Availability</h1>
    <br>
    <form action="your-action-url" method="POST" class="schedule-form">
      <div class="form-field">
        <label for="day">Set Day:</label>
        <select id="day" name="day">
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thursday">Thursday</option>
          <option value="friday">Friday</option>
          <option value="saturday">Saturday</option>
          <option value="sunday">Sunday</option>
        </select>
      </div>

      <div class="form-field">
        <label for="time">Set Time:</label>
        <input type="time" id="time" name="time">
      </div>

      <div class="form-field">
        <label for="availability">Set Availability:</label>
        <select id="availability" name="availability">
          <option value="available">Available</option>
          <option value="not-available">Not Available</option>
        </select>
      </div>

      <div class="form-field">
        <button type="submit">Set Schedule</button>
      </div>
    </form>
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
