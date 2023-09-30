const user = document.querySelector('input[name="username"]');

user.classList.add('tryagain');

window.addEventListener('click', () => user.classList.remove('tryagain'));