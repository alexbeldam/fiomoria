const imgs = document.querySelectorAll('img');
const alternative = {
    src: [
        'img/fairy',
        'img/dragon',
        'img/fiona'
    ],
    alt: [
        'Fada madrinha',
        'Dragão',
        'Fiona'
    ]
};
const original = {
    src: [
        'img/lex',
        'img/jojo',
        'img/julia'
    ],
    alt: [
        'do Alex',
        'da Geovana',
        'da Julia'
    ]
};

for (let i = 0; i < 3; i++) {
    imgs[i].addEventListener('mouseover', () => {
        imgs[i].src = alternative.src[i] + '.jpg';
        imgs[i].alt = alternative.alt[i];
    });
    imgs[i].addEventListener('mouseout', () => {
        imgs[i].src = original.src[i] + '.jpg';
        imgs[i].alt = 'Foto ' + original.alt[i]
    })
}
