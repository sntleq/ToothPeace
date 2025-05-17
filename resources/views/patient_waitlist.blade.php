<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Waitlist Entry</title>
  <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/patient_waitlist.css') }}" />
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
      <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
      <a class="active"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Waitlist Entry</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
      <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
  </div>

  <div class="main-content">

    <div class="main-container">
      <div class="table-container">
        <h1 class="table-title">Waitlist Entry</h1>

        <div class="table-wrapper">
          <table class="appointments-table">
            <thead>
              <tr>
                <th>Waitlist ID</th>
                <th>Patient</th>
                <th>Dentist</th>
                <th>Appointment Type</th>
                <th>Date</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Status</th>
              </tr>
            </thead>
              <tbody>
              @forelse ($entries as $entry)
                  <tr>
                      <td>WL{{ str_pad($entry->id, 3, '0', STR_PAD_LEFT) }}</td>
                      <td>{{ $entry->patient->name ?? 'N/A' }}</td>
                      <td>{{ $entry->dentist->name ?? 'N/A' }}</td>
                      <td>{{ $entry->appointmentType->name ?? 'N/A' }}</td>
                      <td>{{ \Carbon\Carbon::parse($entry->date)->format('F d, Y') }}</td>
                      <td>{{ \Carbon\Carbon::parse($entry->time_start)->format('g:i A') }}</td>
                      <td>{{ \Carbon\Carbon::parse($entry->time_end)->format('g:i A') }}</td>
                      <td class="status-{{ $entry->status }}">{{ ucfirst($entry->status) }}</td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="8" style="text-align: center;">No waitlist entries found.</td>
                  </tr>
              @endforelse
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
