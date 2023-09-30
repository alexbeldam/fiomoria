const board = document.getElementById('fiomoria-game');
const recordEl = document.getElementById('record');
const select = document.querySelector('select');
const playBtn = document.getElementById('play');
const timer = document.getElementById('timer');
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
const countDown = [
    90,
    60,
    30,
    5
];

let timeoutId;
let intervalId;
let pairCount;
let first;
let second;
let time;

function newEl (tag, className) {
    const el = document.createElement(tag);
    el.className = className;

    return el;
}

function newCard(character) {
    const card = newEl('figure', 'fiomoria-carta');
    const front = newEl('figure', 'face frente');
    const back = newEl('figure', 'face verso');

    front.style.backgroundImage = `url('img/${character}.jpg')`;

    card.appendChild(front);
    card.appendChild(back);
    card.setAttribute('data-character', character);

    board.appendChild(card);

    return card;
}

function formatTime(time) {
    if (time < 60)
        return time + 's';
    if (time == 60)
        return '1min';
    return '1min ' + formatTime(time - 60);
}

function endGame(won) {
    clearInterval(intervalId);

    if (won) {
        clearTimeout(timeoutId);

        if (time === '') 
            timer.innerHTML = 'parabéns, você ganhou!';
        else {
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `code/record.php?record=${time}`, true);

            xhr.onload = function() {
                if (xhr.status != 200)
                    return;
                if (xhr.responseText === '0') {
                    timer.innerHTML = 'parabéns, você ganhou!';
                    return;
                }

                recordEl.innerHTML = formatTime(time);
                timer.innerHTML = 'parabéns, novo record!';
            }

            xhr.send();
        }
    }
    else {
        const cards = document.querySelectorAll('.fiomoria-carta:not(.disabled)');

        cards.forEach(card => {
            card.classList.add('flip')
            card.removeEventListener('click', e => flip(e));
        });

        timer.innerHTML = 'você perdeu';
    }
}

function close() {
    first.removeEventListener('click', e => flip(e));
    second.removeEventListener('click', e => flip(e));

    const firstFront = first.firstChild;
    const secondFront = second.firstChild;

    firstFront.classList.add('disabled');
    secondFront.classList.add('disabled');

    ++pairCount;

    first = second = '';

    if (pairCount == characters.length) 
        endGame(true);
}

function unflip() {
    setTimeout(() => {
        if (timer.innerHTML === 'você perdeu')
            return;
            
        first.classList.remove('flip');
        second.classList.remove('flip');
            
        first = second = '';
    }, 1000);
}

function check() {
    const pair = first.getAttribute('data-character') === second.getAttribute('data-character');

    pair ? close() : unflip();
}

function flip(evt) {
    const target = evt.target;
    const card = target.parentNode;

    if (card.className.includes('flip'))
        return;
    if (first === '') {
        first = card;

        card.classList.add('flip');
    }
    else if (second === '') {
        second = card;
        card.classList.add('flip');

        check();
    }
}

function shuffle() {
    const cards = document.querySelectorAll('.fiomoria-carta');

    cards.forEach(card => {
        const posicaoAleatoria = Math.floor(Math.random() * 24);
        card.style.order = posicaoAleatoria;
    });
}

function setTimer(countDown) {
    time = 0;

    timer.innerHTML = formatTime(countDown);

    intervalId = setInterval(() => {
        --countDown;
        ++time;
        
        timer.innerHTML = formatTime(countDown);
    }, 1000);
    timeoutId = setTimeout(() => endGame(false), countDown * 1000);
}

function play(mode) {
    const duplicateCharacters = [...characters, ...characters];
    first = second = time = '';
    pairCount = 0;

    duplicateCharacters.forEach(character => {
        const carta = newCard(character);

        carta.addEventListener('click', flip);
    })
    
    shuffle();

    if (mode == -1)
        timer.innerHTML = 'sem tempo';
    else 
        setTimer(countDown[mode]);
}