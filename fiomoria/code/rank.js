const rank = document.querySelector('.rank');
const avatares = [
    'img/avatar1.jpg',
    'img/avatar2.jpg',
    'img/avatar3.jpg',
    'img/avatar4.jpg',
]

function carrega_rank() {
    const avatars = document.querySelectorAll('ul img');

    avatars.forEach(avtr => {
        let avt = avtr.getAttribute('data-avatar');

        avtr.src = avatares[avt];
    });

    rank.classList.remove('sumiu');
}

function pageOut() {
    rank.classList.add('sumiu');

    const cartas = document.querySelectorAll(".fiomoria-carta");

    cartas.forEach(carta => board.removeChild(carta));
}

play.addEventListener('click', () => {
        if (select.value === '') {
            select.classList.add('tryagain');
            return;
        }
        else if (!game) {
            game = 1;
            play.innerHTML = 'Novo Jogo';
            load(select.value);
            carrega_rank();
        }
        else {
            clearTimeout(timeoutId);
            clearInterval(intervalId);
            pageOut();
            setTimeout(() => {
                load(select.value);
                carrega_rank();
            }, 100);
        }
});

select.addEventListener('click', () => {
    if (select.className.includes('tryagain'))
        select.classList.remove('tryagain');
});