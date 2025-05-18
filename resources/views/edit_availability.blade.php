<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace - Dentist Schedule</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/shared_layout.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dentist_availability.css') }}"/>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo"/>
        <h2><span class="tooth">TOOTH</span><span class="peace">PEACE</span></h2>
        <p>Discover Peace of Mind, One Appointment at a Time.</p>
    </div>
    <nav>
        <a href="{{ route('dentist.dashboard') }}"><img src="{{ asset('pics/dashboard_icon.png') }}" alt="Dashboard">Dashboard</a>
        <a href="{{ route('dentist.schedule') }}"><img src="{{ asset('pics/appointment_icon.png') }}" alt="Schedule">Schedule</a>
        <a class="active"><img src="{{ asset('pics/availability_icon.png') }}" alt="Availability">Availability</a>
    </nav>
    <a href="#" class="logout" id="logoutButton">
        <img src="{{ asset('pics/logout_icon.png') }}" alt="Logout">Log Out
    </a>
</div>

<div class="main-content">
    <a href="{{ route('patient.home') }}" class="back-button">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    <div class="form-container">
        <h2 class="form-title">Edit Availability</h2>

        <form class="patient-form" id="availability-form" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="availability-mode">Setting Mode</label>
                    <select id="availability-mode" name="availability_mode">
                        <option value="recurring">Recurring (For every week since next week)</option>
                        <option value="override">Override (For next week only)</option>
                    </select>
                </div>
            </div>

            @php
                $days = [
                    0 => 'Sunday',
                    1 => 'Monday',
                    2 => 'Tuesday',
                    3 => 'Wednesday',
                    4 => 'Thursday',
                    5 => 'Friday'
                    6 => 'Saturday',
                ];
            @endphp

            @foreach($days as $dayNumber => $dayName)
                <div class="form-row">
                    <div class="form-group">
                        <label for="time_in_{{ $dayNumber }}">{{ $dayName }}: Time In</label>
                        <input type="time" name="availability[{{ $dayNumber }}][start_time]" id="time_in_{{ $dayNumber }}">
                    </div>
                    <div class="form-group">
                        <label for="time_out_{{ $dayNumber }}">{{ $dayName }}: Time Out</label>
                        <input type="time" name="availability[{{ $dayNumber }}][end_time]" id="time_out_{{ $dayNumber }}">
                    </div>
                </div>
            @endforeach

            <div class="form-actions">
                <button type="submit" class="btn-add">Save</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='/patient/Profile'">Cancel</button>
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

<script>
document.getElementById('availability-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const mode = formData.get('availability_mode');

    const url = mode === 'recurring'
        ? "{{ route('availability.store') }}"
        : "{{ route('availability.override.store') }}";

    fetch(url, {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Failed to save availability.');
        return response.json();
    })
    .then(data => {
        alert('Availability saved successfully!');
        window.location.reload();
    })
    .catch(error => {
        console.error(error);
        alert('An error occurred while saving availability.');
    });
});
</script>

<script src="{{ asset('js/dateLinksLogout.js') }}"></script>
</body>
</html>
