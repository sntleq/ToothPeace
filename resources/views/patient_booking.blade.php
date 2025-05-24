<!-- Updated Appointment Booking Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Appointment Booking</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/patient_booking.css') }}"/>
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

        <button class="back-button" onclick="window.location.href='{{ route('patient.appointments') }}'">
            <span class="icon">&#8592;</span> Back
        </button>

        <div class="form-container">
            <h2 class="form-title">Appointment Booking</h2>
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

            <form action="{{ route('patient.booking.queries') }}" method="POST" class="patient-form">
                @csrf

                <!-- Appointment Type -->
                <div class="form-group">
                    <label for="appointmentType">Appointment Type</label>
                    <select id="appointmentType" name="appointment_type_id" required>
                        <option disabled selected hidden>Please select</option>
                        @foreach($categories as $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach($category->appointmentTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('appointment_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <!-- Choose Dentist -->
                <div class="form-group">
                    <label for="preferredDentist">Preferred Dentist</label>
                    <select id="preferredDentist" name="dentist_id" value="old('dentist_id')">
                        <option value="">Any</option>
                        @foreach($dentists as $dentist)
                            <option value="{{ $dentist->id }}" {{ old('dentist_id') == $dentist->id ? 'selected' : '' }}>{{ $dentist->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Form Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-add">See Available Slots</button>
                </div>

            </form>
            @if (old('appointment_type_id'))
            <form action="{{ route('appointments.store') }}" method="POST" class="patient-form">
                @csrf

                <input type="hidden" name="appointment_type_id" value="{{ old('appointment_type_id') }}">
                <input type="hidden" name="dentist_id" value="{{ old('dentist_id') }}">

                <!-- Add lang here -->
                <div class="form-group">
                    <label for="schedule">Pick a Schedule</label>
                    <select id="schedule" name="slot_id" required>
                        <option disabled selected hidden>Select schedule</option>
                        @foreach($freeSlots as $slot)
                            @php
                                $dt = \Carbon\Carbon::parse("{$dates[$slot->day_of_week - 1]} {$slot->start_time}");
                            @endphp
                            <option value="{{ $slot->id }}">{{ $dt->format('l, F j, Y') }} – {{ $dt->format('g:i A') }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Form Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-add">Book</button>
                </div>
            </form>
            @endif
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
</div>

<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
