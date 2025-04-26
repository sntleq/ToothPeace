document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.dentist-form');

  form.addEventListener('submit', (e) => {
    e.preventDefault(); 

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
      alert('Passwords do not match!');
      return;
    }

    const formData = {
      dentistId: document.getElementById('dentistId').value,
      lastName: document.getElementById('lastName').value,
      firstName: document.getElementById('firstName').value,
      middleName: document.getElementById('middleName').value,
      username: document.getElementById('username').value,
      email: document.getElementById('email').value,
      dob: document.getElementById('dob').value,
      password: password
    };

    console.log('Form submitted!', formData);
    alert('Dentist successfully added!');
    window.location.href = 'admin_dentists.html';
  });
});
