require('./bootstrap');
require('./sortable');
require('./pell');
const $ = require('jquery');

// Disable right clic on images
$(document).on('contextmenu', 'img', function() {
    return false;
});

const pathname = window.location.pathname;
if (pathname === '/') {
    window.onscroll = function() {
        navbarCollapse();
    };

    if (window.innerWidth < 769) {
        $(document).ready(() => {
            $('#mainNav').addClass('navbar-shrink');
            $('#logo-img').attr('src', './img/logo/logo-img.png');
            $('#logo-name').attr('src', './img/logo/logo-name.png');
        });
    }
}

// Collapse Navbar
function navbarCollapse() {
    if ($('#mainNav').offset().top > 100 || window.innerWidth < 990) {
        $('#mainNav').addClass('navbar-shrink');
        $('#logo-img').attr('src', './img/logo/logo-img.png');
        $('#logo-name').attr('src', './img/logo/logo-name.png');
    } else {
        $('#mainNav').removeClass('navbar-shrink');
        $('#logo-img').attr('src', './img/logo/logo-img-white.png');
        $('#logo-name').attr('src', './img/logo/logo-name-white.png');
    }
}

// Caroussel lazy loading
$('.carousel.lazy').on('slide.bs.carousel', function(ev) {
    var lazy;
    lazy = $(ev.relatedTarget).find('img[data-src]');
    lazy.attr('src', lazy.data('src'));
    lazy.removeAttr('data-src');
});
