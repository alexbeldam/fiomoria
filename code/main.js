const firstButton = document.querySelector('h1');
const buttons = document.querySelectorAll('h2');
const links = ['fionencia/', 'shrek-wiki/', 'credits/']; 

function buttonChange() {
    firstButton.classList.add('kd');
    firstButton.style.display = 'none';
    
    for (let button of buttons)
    {
        button.style.display = 'block';
        button.classList.remove('kd');
    }
}

firstButton.addEventListener('click', buttonChange);
setTimeout(buttonChange, 10000);

for (let i = 0; i < 3; i++)
    buttons[i].addEventListener('click', () => location.href = links[i]);
