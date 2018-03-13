/**
 * JavaScript dependencies
 */
require('./bootstrap');
require('./gmap');

window.Vue = require('vue'); 

/**
 * Vanilla JS Initializations
 */
$('#calendar').datepicker({
});

$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});

/**
 * Vue Components
 */

Vue.component('deployment-table', require('./components/deployment-table.vue'));
Vue.component('test', require('./components/test.vue'));
const app = new Vue({
    el: '#app',
});
