/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

//Include the images to Webpack
//const imgContext = require.context('../img', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
//imgContext.keys().forEach(imgContext);

// any CSS you require will output into a single css file (app.css in this case)
require('../../node_modules/bootstrap/scss/bootstrap.scss');
require('../css/etoiles.css');
require('../css/fontawesome-stars.css');
require('../css/blog-carousel-bootstrap4.css');
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
var $ = require('jquery');
require('../js/jquery.barrating.min.js');
// require('../js/blog-carousel-bootstrap4.js');

// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
