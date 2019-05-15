const Sortable = require('sortablejs');

const el = document.getElementById('sortable');

if (el) {
    const sortable = Sortable.create(el, {
        animation: 300,
        easing: 'ease-out'
    });
}
