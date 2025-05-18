<!-- Updated Appointment Booking Form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ToothPeace - Appointment Booking</title>
  <link rel="icon" href="pics/toothpeace_logo.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/sharedLayout.css" />
  <link rel="stylesheet" href="css/patient_booking.css" />
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="pics/toothpeace_logo.png" alt="ToothPeace Logo"/>
      <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
      <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
      <a href="patient_profile.html"><img src="pics/patient_profile_icon.png" alt="Home">Home</a>
      <a href="patient_booking.html" class="active"><img src="pics/booking_icon.svg" alt="Book Appointment">Booking</a>
      <a href="patient_appointments.html"><img src="pics/appointment_icon.png" alt="Appointments">Appointments</a>
      <a href="patient_waitlist.html"><img src="pics/waitlist_entry_icon.png" alt="Waitlist Entry">Waitlist Entry</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="pics/logout_icon.png" alt="Logout">Log Out
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

      <div class="form-container">
        <h2 class="form-title">Appointment Booking</h2>
        <form class="patient-form">

          <!-- Appointment Type -->
          <div class="form-group">
            <label for="appointmentType">Appointment Type</label>
            <select id="appointmentType" name="appointmentType" required>
              <option disabled selected>Please select</option>
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

          <!-- Add lang here -->
          <div class="form-group">
            <label for="preferredDentist">Preferred Dentist</label>
            <select id="preferredDentist" name="preferredDentist" required>
              <option disabled selected>Select dentist</option>
              <option>Any</option>
              <option>Dr. Cruz</option>
              <option>Dr. Santos</option>
              <option>Dr. Reyes</option>
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
            <button type="button" class="btn-cancel" onclick="window.location.href='patient_waitlistBooking.html'">Enter Waitlist</button>
            <button type="submit" class="btn-add">Book</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="js/edit_profile.js" defer></script>
  <script src="js/dateLinksLogout.js" defer></script>
</body>
</html>