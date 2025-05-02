const container = document.getElementById('container');
const signUpButton = document.getElementById('signUp');
const backToLogin = document.getElementById('backToLogin');

signUpButton.addEventListener('click', () => container.classList.add("right-panel-active"));
backToLogin.addEventListener('click', () => container.classList.remove("right-panel-active"));