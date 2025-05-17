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
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}" />
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
        <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
        <a href="{{ route('patient.waitlist') }}"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Entry</a>
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

          <a href="{{ route('patient.home') }}" class="back-button">
              <i class="fa fa-arrow-left"></i> Back
            </a>

          <div class="form-container">
              <h2 class="form-title">My Profile</h2>

              <form class="patient-form">
                <div class="form-row">
                  <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" />
                  </div>
                  <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" />
                  </div>
                  <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" id="middleName" name="middleName" />
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" />
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" />
                  </div>
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" />
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" />
                  </div>
                  <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" />
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn-add">Save</button>
                  <button type="button" class="btn-cancel" onclick="window.location.href='/patient/Profile'">Cancel</button>
                </div>
              </form>
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

        <script src="{{ asset('js/edit_profile.js') }}" defer></script>
        <script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
  </body>
  </html>
