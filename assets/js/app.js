/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('bootstrap');

//slide
let $slideChoice = $('.slide-choice'),
    $slideContent= $('.slide-content'),
    $point = $('.point');

let slidesTotal = ($slideChoice.length - 1),
    current = 0,
    isAutoSliding = true;

$point.first().addClass('current');

let clickSlide = function() {
    window.clearInterval(autoSlide);
    isAutoSliding = false;

    let slideIndex = $point.index($(this));

    updateIndex(slideIndex);
};

let updateIndex = function(currentSlide) {
    if(isAutoSliding) {
        if(current === slidesTotal) {
            current = 0;
        } else {
            current++;
        }
    } else {
        current = currentSlide;
    }
    $point.removeClass('current');
    $point.eq(current).addClass('current');
    transition(current);
};

let transition = function(slidePosition) {
    $slideContent.animate({
        'top': '-' + slidePosition + '00%'
    });
};
$point.on( 'click', clickSlide);

let autoSlide = window.setInterval(updateIndex, 4000);
//stop slide

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
