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
        <a class="active"><img src="{{ asset('pics/patient_icon.png') }}" alt="Profile">Profile</a>
        <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      </nav>
      <a href="#" class="logout" id="logoutButton">
          <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
      </a>
    </div>

    <div class="main-content">

      <div class="main-container">
          <h1>Welcome, User!</h1>
          <p>Book your smile appointment today</p>

          <a href="{{ route('patient.home') }}" class="back-button">
              <i class="fa fa-arrow-left"></i> Back
            </a>

          <div class="form-container">
              <h2 class="form-title">My Profile</h2>

              <form action="{{ route('patients.update', $patient) }}" method="POST" class="patient-form">
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                      <div class="form-group">
                          <label for="firstName">First Name</label>
                          <input type="text" id="firstName" name="first_name" value="{{ old('first_name', $patient->first_name) }}" />
                          @error('first_name')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="lastName">Last Name</label>
                          <input type="text" id="lastName" name="last_name" value="{{ old('last_name', $patient->last_name) }}" />
                          @error('last_name')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" id="email" name="email" value="{{ old('email', $patient->email) }}" />
                          @error('email')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="dob">Date of Birth</label>
                          <input type="date" id="dob" name="dob" value="{{ old('dob', $patient->dob->format('Y-m-d')) }}" max="{{ date('Y-m-d') }}" />
                          @error('dob')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-actions">
                      <button type="submit" class="btn-add">Save</button>
                  </div>
              </form>
          </div>

          <div class="form-container">
              <h2 class="form-title">Change Password</h2>
              @if (session()->has('error'))
                  <div class="alert-console error">
                      {{ session('error') }}
                  </div>
              @endif

              <form action="{{ route('patients.update.password', $patient) }}" method="POST" class="patient-form">
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                      <div class="form-group">
                          <label for="currentPassword">Current Password</label>
                          <input type="password" id="currentPassword" name="current_password" value="{{ old('current_password') }}"/>
                          @error('current_password')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group">
                          <label for="newPassword">New Password</label>
                          <input type="password" id="newPassword" name="new_password" value="{{ old('new_password') }}"/>
                          @error('new_password')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="newPasswordConfirm">Confirm New Password</label>
                          <input type="password" id="newPasswordConfirm" name="new_password_confirm" value="{{ old('new_password_confirm') }}"/>
                          @error('new_password_confirm')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-actions">
                      <button type="submit" class="btn-add">Save</button>
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
      </div>
    </div>
  </body>
  </html>
