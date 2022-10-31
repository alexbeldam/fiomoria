const firstButton = document.querySelector('h1');
const buttons = document.querySelectorAll('h2');

firstButton.addEventListener('click', () => {
    for (let button of buttons)
        button.classList.toggle('sumiu');
});