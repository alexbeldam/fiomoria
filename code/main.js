const firstButton = document.querySelector('h1');
const buttons = document.querySelectorAll('h2');

firstButton.addEventListener('click', () => {
    firstButton.classList.add('kd');
    firstButton.style.display = 'none';

    for (let button of buttons)
    {
        button.style.display = 'block';
        button.classList.remove('kd');
    }
});
