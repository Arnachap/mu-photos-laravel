require('./bootstrap');
require('./sortable');
require('./pell');
const $ = require('jquery');

// Disable right clic on images
$(document).on('contextmenu', 'img', function() {
    return false;
});

var pathname = window.location.pathname;
if (pathname === '/') {
    window.onscroll = function() {
        navbarCollapse();
    };
}

// Collapse Navbar
function navbarCollapse() {
    if ($('#mainNav').offset().top > 100) {
        $('#mainNav').addClass('navbar-shrink');
        $('#logo-img').attr('src', './img/logo/logo-img.png');
        $('#logo-name').attr('src', './img/logo/logo-name.png');
    } else {
        $('#mainNav').removeClass('navbar-shrink');
        $('#logo-img').attr('src', './img/logo/logo-img-white.png');
        $('#logo-name').attr('src', './img/logo/logo-name-white.png');
    }
}
