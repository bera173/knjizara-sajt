const wrapper = document.querySelector('.wrapper')
const loginLink = document.querySelector('.login-link')
const btnLogin = document.querySelector('.btn-l')
const iconClose = document.querySelector('.icon-close')

const formBox = document.querySelector('.form-box')


// Provjeri postoji li login_error parametar u URL-u
const urlParams = new URLSearchParams(window.location.search);
const loginError = urlParams.get('login_error');

// Ako postoji, dodajte CSS klase za prikaz form-box i wrapper
if (loginError) {
    formBox.classList.add('show');
    wrapper.classList.add('active-popup');
}

iconClose.addEventListener('click', ()=> {
    formBox.classList.remove('show');
    wrapper.classList.remove('active-popup');
});


loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnLogin.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});



iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup')
});