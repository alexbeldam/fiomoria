const senha = document.querySelector('input[name="senha"]');

senha.classList.add('tryagain');

window.addEventListener('click', () => senha.classList.remove('tryagain'));