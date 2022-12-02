const select = document.querySelector('select[name="game-mode"');
const play = document.querySelector('#joga');
const board = document.querySelector('.fiomoria-game');
const characters = [
    'burro',
    'burroAlazao',
    'dragao',
    'encantado',
    'fada',
    'farquaad',
    'fiona',
    'fionaHumana',
    'gato',
    'rumple',
    'shrek',
    'shrekHumano'
];
const timer = document.querySelector(".time");
const countDown = [
    90,
    60,
    30,
    5
];
let rec;
let pares;
let game = 0;
let first;
let second;
let timeoutId;
let intervalId;

function novoElemento (tag, classe) 
{
    const el = document.createElement(tag);
    el.className = classe;

    return el;
}

function criaCarta(character) 
{
    const carta = novoElemento('figure', 'fiomoria-carta');
    const frente = novoElemento('figure', 'face frente');
    const verso = novoElemento('figure', 'face verso');

    frente.style.backgroundImage = `url("img/${character}.jpg")`;

    carta.appendChild(frente);
    carta.appendChild(verso);
    carta.setAttribute('data-character', character);

    board.appendChild(carta);

    return carta;
}

function endGame(won) {
    clearInterval(intervalId);

    if (won) {
        clearTimeout(timeoutId);

        if (rec === '') 
            timer.innerHTML = 'Parabéns, você Ganhou';
        else
            $.ajax({
                url: 'code/record.php',
                method: 'POST',
                data: {
                    record: rec
                }
            }).done(result => {
                if (result != 0) {
                    const recordEl = document.querySelector('.yrecord');

                    if (result == 60)
                        recordEl.innerHTML = '1min';
                    else if (result > 60) {
                        const segundos = result - 60;

                        recordEl.innerHTML = '1min ' + segundos + 's';
                    }
                    else 
                        recordEl.innerHTML = result + 's';

                    timer.innerHTML = 'Parabéns, novo record';
                }
                else
                    timer.innerHTML = 'Parabéns, você Ganhou';
            });
    }
    else {
        const cartas = document.querySelectorAll('.fiomoria-carta:not(.flip)');
        cartas.forEach(carta => carta.classList.add('flip'));

        timer.innerHTML = 'Você perdeu';
    }
}

function close() 
{
    first.removeEventListener('click', e => flip(e));
    second.removeEventListener('click', e => flip(e));
    const firstFrente = first.firstChild;
    const secondFrente = second.firstChild;

    firstFrente.classList.add('disabled');
    secondFrente.classList.add('disabled');

    pares++;

    first = '';
    second = '';

    if(pares == 12) 
        endGame(1);
}

function unflip() 
{
    setTimeout(() => {
        first.classList.remove('flip');
        second.classList.remove('flip');

        first = '';
        second = '';
    }, 1000);
}

function checar() 
{
    par = first.getAttribute('data-character') === second.getAttribute('data-character');

    par ? close() : unflip();
}

function flip(evt) 
{
    const target = evt.target;
    const carta = target.parentNode;

    if (carta.className.includes('flip'))
        return;
    if (first === '') {
        first = carta;

        carta.classList.add('flip');
    }
    else if (second === '') {
        second = carta;
        carta.classList.add('flip');

        checar();
    }
}

function embaralhar() 
{
    const cartas = document.querySelectorAll('.fiomoria-carta');

    cartas.forEach(carta => {
        let posicaoAleatoria = Math.floor(Math.random() * 24);
        carta.style.order = posicaoAleatoria;
    });
}

function timeSet(countDown) {
    let segundos;
    rec = 0;

    if (countDown > 60) {
        segundos = countDown - 60;

        timer.innerHTML = '1min ' + segundos + 's';
    }
    else if (countDown == 60)
        timer.innerHTML = '1min';
    else 
        timer.innerHTML = countDown + 's';

    intervalId = setInterval(() => {
        countDown--;
        rec++;
        
        if (countDown > 60) {
            segundos = countDown - 60;

            timer.innerHTML = '1min ' + segundos + 's';
        }
        else if (countDown == 60)
            timer.innerHTML = '1min';
        else 
            timer.innerHTML = countDown + 's';
    }, 1000);
    timeoutId = setTimeout(() => endGame(0), countDown * 1000);
}

function load(dificuldade) 
{
    const duplicateCharacters = [...characters, ...characters];
    first = second = rec = '';
    pares = 0;

    duplicateCharacters.forEach(character => {
        const carta = criaCarta(character);

        carta.addEventListener('click', flip);
    })
    
    embaralhar();

    if (dificuldade == 0)
        timer.innerHTML = "Sem tempo";
    else 
        timeSet(countDown[dificuldade - 1]);
}