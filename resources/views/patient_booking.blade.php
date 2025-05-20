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
        <a class="active"><img src="{{ asset('pics/booking_icon.svg') }}" alt="Booking">Booking</a>
        <a href="{{ route('patient.appointments') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Appointments">Appointments</a>
        <a href="{{ route('patient.waitlist') }}"><img src="{{ asset('pics/waitlist_entry_icon.png') }}" alt="Waitlist Entry">Waitlist Entries</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">

    <div class="main-container">

        <div class="form-container">
            <h2 class="form-title">Appointment Booking</h2>
            <form class="patient-form">

                <!-- Appointment Type -->
                <div class="form-group">
                    <label for="appointmentType">Appointment Type</label>
                    <select id="appointmentType" name="appointmentType" required>
                        <option disabled selected>Please select</option>
                        @foreach($categories as $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach($category->appointmentTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>


                <!-- Add lang here -->
                <div class="form-group">
                    <label for="preferredDentist">Preferred Dentist</label>
                    <select id="preferredDentist" name="preferredDentist" required>
                        <option disabled selected>Select dentist</option>
                        <option value="any">Any</option>
                        @foreach($dentists as $dentist)
                            <option value="{{ $dentist->id }}">{{ $dentist->name }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Add lang here -->
                <div class="form-group">
                    <label for="schedule">Pick a Schedule</label>
                    <select id="schedule" name="schedule" required>
                        <option disabled selected>Select schedule</option>
                        <option>May 20, 2025 – 09:00 AM</option>
                        <option>May 20, 2025 – 10:00 AM</option>
                        <option>May 21, 2025 – 01:00 PM</option>
                        <option>May 21, 2025 – 03:30 PM</option>
                    </select>
                </div>

                <!-- Form Buttons -->
                <div class="form-actions">
                    <button type="button" class="btn-cancel"
                            onclick="window.location.href='{{ route('patient.waitlist.add') }}'">Enter Waitlist
                    </button>
                    <button type="submit" class="btn-add">Book</button>
                </div>

            </form>
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
