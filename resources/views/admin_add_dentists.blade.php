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
  <link rel="stylesheet" href="{{ asset('css/admin_add_dentists.css') }}" />
</head>
<body>
@if (session('success'))
    <div class="alert-console success">
        {{ session('success') }}
    </div>
@endif
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
    <a href="{{ route ('admin.dashboard') }}" class="active"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
      <a href="{{ route ('admin.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a href="{{ route ('admin.waitlist') }}"><img src="{{ asset('pics/waitlist_icon.png') }}" alt="Waitlist">Waitlist</a>
      <a href="{{ route ('admin.patients') }}"><img src="{{ asset('pics/patient_icon.png') }}" alt="Patients">Patients</a>
      <a href="{{ route ('admin.dentists') }}"><img src="{{ asset('pics/dentist_icon.png') }}" alt="Dentists">Dentists</a>
      <a href="{{ route ('admin.controls') }}"><img src="{{ asset('pics/admincontrols_icon.png') }}" alt="Admin Controls">Admin Controls</a>
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

    <h1><span class="page-title">Dentists</span></h1>

    <button class="back-button" onclick="window.location.href='{{ route('admin.dentists') }}'">
      <span class="icon">&#8592;</span> Back
    </button>

    <div class="form-container">
      <h2 class="form-title">ADD DENTIST</h2>
      @if (session()->has('error'))
          <div class="alert-console error">
              {{ session('error') }}
          </div>
      @endif

      <form action="{{ route('admin.dentists.store') }}" method="POST" class="dentist-form">
        @csrf
        <div class="form-row">
          <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" />
              @error('lastName')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" />
              @error('firstName')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="middleName">Middle Name</label>
              <input type="text" id="middleName" name="middleName" value="{{ old('middleName') }}" />
              @error('middleName')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" />
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" />
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" />
            @error('dob')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" />
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" />
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-add">Add</button>
          <button type="button" class="btn-cancel" onclick="window.location.href='{{ route ('admin.dentists') }}'">Cancel</button>
        </div>
      </form>
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

  <script src="{{ asset('js/admin_add_dentists.js') }}" defer></script>
  <script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
</body>
</html>