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
let first = '';
let second = '';

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
    carta.setAttribute('data-character', character)

    board.appendChild(carta);

    return carta
}

function close() 
{
    first.removeEventListener('click', e => flip(e));
    second.removeEventListener('click', e => flip(e));
    const firstFrente = first.firstChild;
    const secondFrente = second.firstChild;

    firstFrente.classList.add('disabled');
    secondFrente.classList.add('disabled');

    first = '';
    second = '';
}

function unflip() 
{
    setTimeout(() => {
        first.classList.remove('flip');
        second.classList.remove('flip');

        first = '';
        second = '';
    }, 1000)
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

function load(dificuldade) 
{
    const duplicateCharacters = [...characters, ...characters];

    duplicateCharacters.forEach(character => {
        const carta = criaCarta(character);

        carta.addEventListener('click', flip);
    })
    
    embaralhar();
}

play.addEventListener('click', () => {
    if (select.value === '') {
        select.classList.add('tryagain');

        setTimeout(() => select.classList.remove('tryagain'), 1500);

        return;
    }
    else 
        load(select.value);
});
