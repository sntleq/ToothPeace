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
            <h2 class="form-title">Waitlist Signup</h2>
            <form class="patient-form">
                <div class="form-group">
                    <label for="appointmentType">Appointment Type</label>
                    <select id="appointmentType" name="appointmentType">
                        <optgroup label="Dental Appointments">
                            <option>Dental Cleaning</option>
                            <option>Dental Exam/Check-up</option>
                            <option>X-rays</option>
                        </optgroup>
                        <optgroup label="Restorative Treatment">
                            <option>Tooth Filling</option>
                            <option>Tooth Extraction</option>
                            <option>Root Canal</option>
                            <option>Dental Crown</option>
                            <option>Bridge Placement</option>
                            <option>Dental Implants</option>
                            <option>Inlays/Onlays</option>
                        </optgroup>
                        <optgroup label="Preventive Treatment">
                            <option>Flouride Treatment</option>
                            <option>Dental Sealants</option>
                            <option>Oral Cancer Screening</option>
                            <option>Deep Cleaning</option>
                        </optgroup>
                        <optgroup label="Cosmetic Dentistry">
                            <option>Teeth Whitening</option>
                            <option>Dental Bonding</option>
                            <option>Veeners</option>
                            <option>Smile Makeover</option>
                            <option>Gum Contouring</option>
                        </optgroup>
                        <optgroup label="Orthodontics">
                            <option>Braces</option>
                            <option>Traditional Metal Braces</option>
                            <option>Clear Aligners</option>
                            <option>Retainers</option>
                        </optgroup>
                        <optgroup label="Oral Surgery">
                            <option>Wisdom Tooth Extraction</option>
                            <option>Bone Grafting</option>
                        </optgroup>
                        <optgroup label="Pediatric Dentistry">
                            <option>Children’s Check-up</option>
                            <option>Fluoride Treatment for Kids</option>
                            <option>Pediatric Dental Cleaning</option>
                            <option>Space Maintainers</option>
                            <option>Sealants for Children</option>
                        </optgroup>
                        <optgroup label="Periodontics (Gum)">
                            <option>Deep Cleaning</option>
                            <option>Gum Grafting</option>
                            <option>Periodontal Maintenance</option>
                            <option>Crown Lengthening</option>
                        </optgroup>
                        <optgroup label="Emergency Dentistry">
                            <option>Toothache Relief</option>
                            <option>Trauma Care</option>
                            <option>Abscess Treatment</option>
                            <option>Lost Filling / Crown Repair</option>
                            <option>Broken Tooth Restoration</option>
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <label for="preferredDentist">Preferred Dentist</label>
                    <select id="preferredDentist" name="preferredDentist">
                        <option>Any</option>
                        <option>Dr. Cruz</option>
                        <option>Dr. Santos</option>
                        <option>Dr. Reyes</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="preferredDate">Preferred Date</label>
                    <input type="date" id="preferredDate" name="preferredDate"/>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="timeFrom">From</label>
                        <select id="timeFrom" name="timeFrom">
                            <!-- Add langs  -->
                            <option>08:00</option>
                            <option>09:00</option>
                            <option>10:00</option>
                            <option>11:00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="timeTo">To</label>
                        <select id="timeTo" name="timeTo">
                            <!-- Add langs -->
                            <option>08:30</option>
                            <option>09:30</option>
                            <option>10:30</option>
                            <option>11:30</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-add">Submit</button>
                    <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('patient.booking') }}'">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
