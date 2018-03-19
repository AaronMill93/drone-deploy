/**
 * JavaScript dependencies
 */
require('./bootstrap');

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
 * Gmaps
 */
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyAAITMP5K5nzW7LYr7TfwxznKO1ZcLha50',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
  }
})

window.onload = function () {
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};

/**
 * Vue Components
 */

Vue.component('deployment-table', require('./components/DeploymentTable.vue'));
Vue.component('deployment-table-gmap-input', require('./components/DeploymentTableGmapInput.vue'));

const app = new Vue({
	el: '#app'
});
