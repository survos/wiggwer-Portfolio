/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';
import '../vendor/icofont/icofont.min.css';
import '../vendor/boxicons/css/boxicons.min.css';
import '../vendor/owl.carousel/assets/owl.carousel.min.css';
import '../vendor/venobox/venobox.css';
import '../css/style.css';

const $ = require('jquery');

import '../vendor/jquery.easing/jquery.easing.min.js';
import '../vendor/waypoints/jquery.waypoints.min.js';
import '../vendor/counterup/counterup.min.js';
import '../vendor/owl.carousel/owl.carousel.min.js';
import '../vendor/isotope-layout/isotope.pkgd.min.js';
import '../vendor/venobox/venobox.min.js';
import '../js/main.js';
import '../js/title.js';

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

require('bootstrap');


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
