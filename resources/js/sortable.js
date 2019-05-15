const Sortable = require('sortablejs');

const el = document.getElementById('sortable');
const sortable = Sortable.create(el, {
    animation: 300,
    easing: 'ease-out'
});
