const avatares = [
    'img/avatar1.jpg',
    'img/avatar2.jpg',
    'img/avatar3.jpg',
    'img/avatar4.jpg',
]

function carrega_rank() {
    const avatars = document.querySelectorAll('ul img');
    const rank = document.querySelector('.rank');

    avatars.forEach(avtr => {
        let avt = avtr.getAttribute('data-avatar');

        avtr.src = avatares[avt];
    });

    rank.classList.remove('sumiu');
}

play.addEventListener('click', () => {
        if (select.value === '') {
            select.classList.add('tryagain');
    
            setTimeout(() => select.classList.remove('tryagain'), 1500);
    
            return;
        }
        else {
            load(select.value);
            carrega_rank();
        }
});
