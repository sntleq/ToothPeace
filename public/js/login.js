const container = document.getElementById('container');
const signUpButton = document.getElementById('signUp');
const backToLogin = document.getElementById('backToLogin');
const loginForm = document.getElementById('loginForm');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

backToLogin.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

loginForm.addEventListener('submit', function(event) {
    event.preventDefault(); 

    location.href = 'dentist_dashboard.html';
});