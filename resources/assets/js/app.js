import Vue from 'vue'
import Sortable from 'vue-sortable'
/**
 * JavaScript dependencies
 */
require('./bootstrap');
require('./gmap');

window.Vue = require('vue'); 
Vue.use(Sortable);

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

const app = new Vue({
    el: '#app'
});
