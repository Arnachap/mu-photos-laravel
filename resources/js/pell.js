import pell from 'pell';

const intro = document.getElementById('intro');
const content = document.getElementsByClassName('pell-content');
const editor = document.getElementById('editor');

if (editor) {
    // Initialize pell on an HTMLElement
    pell.init({
        // <HTMLElement>, required
        element: editor,

        // <Function>, required
        // Use the output html, triggered by element's `oninput` event
        onChange: html => (intro.value = html)
    });

    content[0].innerHTML = intro.value;
}
