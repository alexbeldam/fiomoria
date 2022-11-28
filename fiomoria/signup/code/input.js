const user = document.querySelector('input[name="user"]');

user.classList.add('tryagain');

window.addEventListener('click', () => user.classList.remove('tryagain'));