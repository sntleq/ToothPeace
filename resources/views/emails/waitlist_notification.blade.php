<h2>Hi there,</h2>
<p>An appointment slot has just opened up for:</p>

<ul>
    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}</li>
    <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->time)->format('g:i A') }}</li>
    <li><strong>Dentist:</strong> {{ $appointment->dentist->name }}</li>
</ul>

<p>Please log in to your account if you want to book it before others do.</p>
<p>– ToothPeace Team</p>
