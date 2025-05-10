const container = document.getElementById('container');
const signUpButton = document.getElementById('signUp');
const backToLogin = document.getElementById('backToLogin');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    if (location.pathname !== '/signup') {
        history.pushState({ panel: 'signup' }, '', '/signup');
    }
});
backToLogin.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    if (location.pathname !== '/login') {
        history.pushState({ panel: 'login' }, '', '/login');
    }
});
