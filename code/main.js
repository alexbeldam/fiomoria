const firstButton = document.querySelector('h1');
const buttons = document.querySelectorAll('h2');
const links = ['game/', 'credits/']; 

function buttonChange() {
    firstButton.classList.add('kd');
    firstButton.style.display = 'none';
    
    for (const button of buttons) {
        button.style.display = 'block';
        button.classList.remove('kd');
    }
}

firstButton.addEventListener('click', buttonChange);

for (let i = 0; i < 2; i++)
    buttons[i].addEventListener('click', () => location.href = links[i]);

setTimeout(buttonChange, 10000);