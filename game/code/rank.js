const rank = document.getElementById('rank');

document.addEventListener('DOMContentLoaded', () => {
    setInterval(() => {
        const xhr = new XMLHttpRequest();

        xhr.open('GET', 'code/rank.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) 
                $('#top').html(xhr.responseText).fadeIn('slow');
        };

        xhr.send();
    }, 1000);
});

function loadRank() {
    rank.classList.remove('sumiu');
}

function pageOut() {
    rank.classList.add('sumiu');

    const cards = document.querySelectorAll('.fiomoria-carta');

    cards.forEach(card => board.removeChild(card));
}

function load(mode) {
    play(mode);
    loadRank();
}

playBtn.addEventListener('click', () => {
    if (select.value === '') {
        select.classList.add('tryagain');
        return;
    } 
    if (playBtn.innerHTML == 'Jogar') {
        playBtn.innerHTML = 'Novo Jogo';
        load(select.value);
    }
    else {
        clearTimeout(timeoutId);
        clearInterval(intervalId);
        pageOut();
        setTimeout(() => {
            load(select.value);
        }, 100);
    }
});

select.addEventListener('click', () => {
    if (select.className.includes('tryagain'))
        select.classList.remove('tryagain');
});