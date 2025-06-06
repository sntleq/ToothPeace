<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Appointments</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/patient_appointments.css') }}"/>
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
        <a class="active"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">

    <div class="main-container">

        <div class="table-container">
            <h1 class="table-header">My Appointments</h1>
            <div class="table-wrapper">
                @if (session('success'))
                    <div class="alert-console success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert-console error">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-console error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="appointments-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Appointment Type</th>
                        <th>Dentist</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->time)->format('g:i A') }}</td>
                            <td>{{ $appointment->appointmentType->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->dentist->name ?? 'N/A' }}</td>
                            <td>
                                {{ $appointment->is_active ? 'Active' : 'Inactive' }}
                            </td>
                            <td>
                                {{-- open button --}}
                                <button
                                    class="cancel-btn open-modal"
                                    id="cancelBtn{{ $appointment->id }}"
                                >Cancel</button>

                                {{-- modal (hidden by default) --}}
                                <div
                                    id="cancelModal{{ $appointment->id }}"
                                    class="logout-modal"
                                    style="display: none;"
                                >
                                    <div class="modal-content">
                                        <h3>Cancel appointment?</h3>
                                        <div class="modal-buttons">
                                            <form
                                                action="{{ route('appointments.complete', $appointment->id) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="confirm-btn">
                                                    Cancel
                                                </button>
                                            </form>
                                            {{-- close button --}}
                                            <button
                                                class="cancelCancel cancel-btn"
                                                id="cancelCancel{{ $appointment->id }}"
                                            >No</button>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">No appointments found.</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        <div class="appointment-buttons-wrapper">
            <button class="book-here-btn"
                    onclick="window.location.href='{{ route('patient.booking') }}'">
                Book Appointment
            </button>
            <button class="appointment-history-btn"
                    onclick="window.location.href='{{ route('patient.appointments.history') }}'">
                View Appointment History
            </button>
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

<script src="{{ asset('js/patient_appointments.js') }}" defer></script>
<script src="{{ asset('js/dateLinksLogout.js') }}" defer></script>
<script src="{{ asset('js/cancelModal.js') }}" defer></script>
</body>
</html>
